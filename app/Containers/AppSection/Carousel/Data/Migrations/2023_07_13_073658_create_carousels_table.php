<?php

use App\Containers\AppSection\Carousel\Enums\CarouselTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title', 100);
            $table->integer('order')->default(0);
            $table->string('type')->default(CarouselTypeEnum::Category->value);
            $table->timestamps();

            $table->index([
                'shop_id',
                'category_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousels');
    }
};
