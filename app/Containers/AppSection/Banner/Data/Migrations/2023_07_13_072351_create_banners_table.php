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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->string('title', 100)->nullable();
            $table->string('alt', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->integer('order')->default(0);
            $table->string('column', 50)->nullable();
            $table->string('page', 100)->nullable();
            $table->string('situation', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->index([
                'shop_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
