<?php

use App\Containers\AppSection\Comment\Enums\CommentStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->string('username', 100)->nullable();
            $table->longText('body');
            $table->bigInteger('like')->default(0);
            $table->bigInteger('dislike')->default(0);
            $table->string('status')->default(CommentStatusEnum::Pending->value);
            $table->timestamps();

            $table->index([
                'shop_id',
                'customer_id',
                'comment_id',
            ]);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
