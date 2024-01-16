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
        Schema::create('shop_transfer_amounts', function (Blueprint $table) {

            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->integer('amount');

            $table->index([
                'shop_id',
                'province_id',
                'city_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_transfer_amounts');
    }
};
