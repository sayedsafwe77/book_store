<?php

namespace App\Http\Controllers;

use App\Builders\OrderBuilder;
use App\Models\Order;
use App\Models\User;
use App\PaymentTypeEnum;
use App\Services\PaymobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct(public PaymobService $paymentService) {
    }
    function show(Order $order)  {
        return view('website.order_details',compact('order'));

    }
    function create()  {
        $orderBuilder = new OrderBuilder;
        DB::beginTransaction();
        try {
            $order = $orderBuilder
            ->setUser(Auth::id())
            ->setTax(request()->tax_percentage)
            ->setAddress(request()->address,(bool)request()->save_to_address)
            ->setShippingAddress(request()->shipping_area_id)
            ->setPaymentType(request()->payment_type)
            ->build();
            if(request()->payment_type == PaymentTypeEnum::Visa->value){
                $data['billing_data'] = $this->getBillingData($order);
                $data['price'] = $order->total;
                $paymentUrl = $this->paymentService->processPayment($data,$order);
                DB::commit();
                return redirect()->away($paymentUrl);
            }
            DB::commit();
            return redirect()->route('order.show',$order);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','something went wrong');
        }
    }
    function getBillingData($order){
        return [
            "first_name" => $order->user->first_name,
            "last_name" => $order->user->last_name,
            "email" => $order->user->email,
            "city" => $order->address,
        ];
    }
}
