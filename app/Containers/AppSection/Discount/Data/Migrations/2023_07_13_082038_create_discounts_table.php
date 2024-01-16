<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('title', 100);
            $table->bigInteger('value');
            $table->timestamp('started_at');
            $table->timestamp('ended_at');
            $table->bigInteger('min_buy');
            $table->bigInteger('max_discount');
            $table->string('type');
            $table->boolean('is_percent')->default(1);
            $table->integer('quantity');
            $table->integer('remain');
            $table->timestamps();

            $table->index([
                'shop_id',
                'customer_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
