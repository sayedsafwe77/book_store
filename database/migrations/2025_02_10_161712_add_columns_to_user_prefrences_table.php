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
        Schema::table('user_prefrences', function (Blueprint $table) {
            $table->unsignedSmallInteger('number_of_interests')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_prefrences', function (Blueprint $table) {
            $table->dropColumn('number_of_interests');
        });
    }
};
