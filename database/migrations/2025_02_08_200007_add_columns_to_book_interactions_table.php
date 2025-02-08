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
        Schema::table('book_interactions', function (Blueprint $table) {
            $table->float('rate')->nullable()->change();
            $table->unsignedSmallInteger('quantity')->nullable();
            $table->boolean('is_favorite')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_interactions', function (Blueprint $table) {
            //
        });
    }
};
