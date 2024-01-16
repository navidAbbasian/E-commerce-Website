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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('title', 100);
            $table->longText('meta_title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('meta_description')->nullable();
            $table->integer('price');
            $table->integer('weight')->default(0);
            $table->integer('length')->default(0);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('score')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->index([
                'shop_id',
                'brand_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
