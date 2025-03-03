<?php

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
        Schema::table('book_orders', function (Blueprint $table) {
            $table->float('price_after_discount')->default(0)->after('price');
            $table->float('applied_discount')->default(0)->after('price_after_discount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_orders', function (Blueprint $table) {
            $table->dropColumn('applied_discount');
            $table->dropColumn('price_before_discount');

        });
    }
};
