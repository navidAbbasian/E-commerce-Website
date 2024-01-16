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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title', 100);
            $table->string('link', 255)->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index([
                'shop_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('parent_id')->references('id')->on('footers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
