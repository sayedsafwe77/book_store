<?php
namespace App\Builders;

use App\Models\AddToCart;
use App\Models\Book;
use App\Models\Order;
use App\Models\ShippingArea;
use App\Models\UserAddress;
use App\OrderStatusEnum;
use App\PaymentStatusEnum;
use App\PaymentTypeEnum;
use Exception;
use Illuminate\Support\Facades\DB;


class OrderBuilder {
    private Order $order;
    private array $books = [];
    private int $tax = 0;

    public function __construct() {
        $this->order = new Order();
        $this->order->status = OrderStatusEnum::Pending;
    }

    public function setUser(int $user_id): self {
        $this->order->user_id = $user_id;
        $this->order->number = strtoupper(substr(md5(time() . $user_id), 0, 8));
        $this->setOrderItems($user_id);
        return $this;
    }

    public function setOrderItems(int $user_id): self {
        $userCart = AddToCart::where('user_id', $user_id)->get();

        foreach ($userCart as $item) {
            $this->books[] = [
                'book' => $item->book,
                'quantity' => $item->quantity,
                'price' => $item->book->price,
                'price_with_discount' => $item->book->getPrice(),
                'discount' => $item->book->getDiscountValue(),
            ];
        }

        return $this;
    }

    public function setPaymentType(string $payment_type): self {
        $this->order->payment_type = $payment_type;
        $this->order->payment_status = PaymentStatusEnum::Unpaid;

        if ($payment_type === PaymentTypeEnum::Cash->value) {
            $this->order->payment_status = PaymentStatusEnum::Paid;
        }

        return $this;
    }

    public function setAddress(string|int $address,bool $save): self {
        $user_id= $this->getUserId();
        if(is_numeric($address)) $address = UserAddress::where('user_id',$user_id)->where('id',$address)->first()->address;
        $this->order->address = $address;
        if($save) UserAddress::create(['user_id' => $user_id,'address' => $address]);
        return $this;
    }

    public function setTax(int $tax_amount): self {
        $this->tax = $tax_amount;
        return $this;
    }
    public function getUserId(): int {
        return $this->order->user_id;
    }

    public function setShippingAddress(int $shipping_area_id): self {
        $this->order->shipping_area_id = $shipping_area_id;
        $shipping_area = ShippingArea::find($shipping_area_id);

        if (!$shipping_area) {
            throw new Exception("Invalid Shipping Area ID: $shipping_area_id");
        }

        $this->order->shipping_fee = $shipping_area->fee;
        return $this;
    }

    public function build(): Order {
        if (!isset($this->order->user_id)) {
            throw new Exception("User ID is required before building the order.");
        }

        if (empty($this->books)) {
            throw new Exception("Cannot create an order without books.");
        }

        if (!isset($this->order->payment_type)) {
            throw new Exception("Payment type must be set before creating an order.");
        }

        return DB::transaction(function () {
            $this->order->books_total = collect($this->books)->reduce(fn($acc,$book) => $acc + ($book['price_with_discount'] * $book['quantity']),0);
            $this->order->tax_amount = $this->getOrderTax($this->order->books_total + $this->order->shipping_fee);
            $this->order->total = $this->order->books_total + $this->order->shipping_fee + $this->order->tax_amount;
            $this->order->save();

            foreach ($this->books as $book) {
                $this->order->books()->attach($book['book']->id, [
                    'quantity' => $book['quantity'],
                    'price' => $book['price'],
                    'applied_discount' => $book['discount'],
                    'price_after_discount' => $book['price_with_discount']
                ]);
            }

            $this->clearUserCart();
            return $this->order;
        });
    }

    private function getOrderTax(float $total): float {
        return $total * ($this->tax / 100);
    }

    private function clearUserCart(): void {
        AddToCart::where('user_id', $this->order->user_id)->delete();
    }
}
