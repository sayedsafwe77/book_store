<?php

use App\Models\ShippingArea;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->float('shipping_fee');
            $table->float('books_total');
            $table->float('total');
            $table->string('status');
            $table->string('payment_status');
            $table->enum('payment_type',['cash','visa']);
            $table->float('tax_amount');
            $table->string('transaction_reference');
            $table->string('address');
            $table->foreignIdFor(ShippingArea::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
