<?php

use App\Containers\AppSection\Shop\Enums\ShopStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 255);
            $table->longText('meta_title');
            $table->longText('description');
            $table->longText('meta_description');
            $table->longText('address');
            $table->string('email', 100);
            $table->string('area_code', 4);
            $table->string('phone', 7);
            $table->integer('score_worth');
            $table->string('status')->default(ShopStatusEnum::Pending->value);
            $table->timestamps();

            $table->index([
                'user_id',
            ]);
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
