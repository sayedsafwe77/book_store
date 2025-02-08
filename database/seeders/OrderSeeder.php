<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory()->count(10)->create()->each(function ($order) {

            $books = Book::inRandomOrder()->limit(rand(1, 5))->get();

            foreach ($books as $book) {
                BookOrder::create([
                    'order_id' => $order->id,
                    'book_id' => $book->id,
                    'price' => $book->price ?? fake()->randomFloat(2, 5, 50),
                    'quantity' => rand(1, 5),
                ]);
            }
        });
    }
}
