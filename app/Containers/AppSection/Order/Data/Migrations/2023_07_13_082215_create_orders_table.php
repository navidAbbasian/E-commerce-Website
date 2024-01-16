<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('price');
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->index([
                'shop_id',
                'customer_id',
                'discount_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('discount_id')->references('id')->on('discounts');
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
