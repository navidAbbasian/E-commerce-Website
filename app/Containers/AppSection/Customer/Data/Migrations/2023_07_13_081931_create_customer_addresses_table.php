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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('city_id');
            $table->string('fullname');
            $table->longText('address');
            $table->string('zipcode', 10);
            $table->string('floor', 3);
            $table->string('unit', 4);
            $table->string('number', 5);
            $table->string('mobile', 11);
            $table->string('phone', 11);
            $table->timestamps();

            $table->index([
                'customer_id',
                'city_id',
            ]);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
