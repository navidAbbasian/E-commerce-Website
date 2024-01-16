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
        Schema::create('wish_list_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wish_list_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->index([
                'wish_list_id',
                'product_id',
            ]);
            $table->foreign('wish_list_id')->references('id')->on('wish_lists');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_list_items');
    }
};
