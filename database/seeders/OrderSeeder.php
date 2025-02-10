<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\OrderStatusEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // status payment_type payment_status
        // Order::factory()->withBooks()->VisaPaid()->count(200)->create();
        // Order::factory()->withBooks()->VisaUnpaid()->count(50)->create();
        // Order::factory()->withBooks()->VisaRefunded()->count(100)->create();
        // Order::factory()->withBooks()->status(OrderStatusEnum::Cancelled)->cash()->count(50)->create();
        // Order::factory()->withBooks()->status(OrderStatusEnum::Confirmed)->cash()->count(200)->create();
        // Order::factory()->withBooks()->status(OrderStatusEnum::Pending)->cash()->count(200)->create();
        // Order::factory()->withBooks()->status(OrderStatusEnum::Delivered)->cash()->count(200)->create();
        // Order::factory()->withBooks()->status(OrderStatusEnum::Delivered)->previousWeeks()->count(200)->create();
        // Order::factory()->withBooks()->status(OrderStatusEnum::Cancelled)->previousWeeks(6)->count(20)->create();
        Order::factory()->withBooks()->status(OrderStatusEnum::Delivered)->previousMonths(5)->count(10)->create();
        Order::factory()->withBooks()->status(OrderStatusEnum::Delivered)->previousMonths(4)->count(10)->create();
        Order::factory()->withBooks()->status(OrderStatusEnum::Delivered)->previousMonths(6)->count(10)->create();
    }
}
