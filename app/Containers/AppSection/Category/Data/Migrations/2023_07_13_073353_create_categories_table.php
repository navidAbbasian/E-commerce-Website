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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title', 100);
            $table->longText('meta_title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('meta_description')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();

            $table->index([
                'shop_id',
                'parent_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
