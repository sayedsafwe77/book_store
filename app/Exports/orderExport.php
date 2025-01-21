<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class orderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
    public function map($order): array
    {
        return [
            $order->id,
            $order->number,
            $order->shipping_fee,
            $order->books_total,
            $order->total,
            $order->status,
            $order->payment_status,
            $order->payment_type,
            $order->tax_amount,
            $order->transaction_reference,
            $order->address,
            $order->shipping_area_id,
            $order->user_id,

        ];
    }


    /**
     * Define the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
{
    return [
        'ID',
        'Order Number',
        'Shipping Fee',
        'Books Total',
        'Total',
        'Status',
        'Payment Status',
        'Payment Type',
        'Tax Amount',
        'Transaction Reference',
        'Address',
        'Shipping Area ID',
        'User ID'
    ];
}
}