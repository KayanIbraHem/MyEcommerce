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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('type');
            $table->boolean('type_of_use')->default(0);
            $table->integer('max_uses')->default(1);
            $table->integer('value')->nullable();
            $table->integer('precent_off')->nullable();
            $table->integer('max_discount')->nullable();
            $table->integer('minimum_of_total');
            $table->integer('current_uses')->default(0);
            $table->date('start_date');
            $table->date('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
