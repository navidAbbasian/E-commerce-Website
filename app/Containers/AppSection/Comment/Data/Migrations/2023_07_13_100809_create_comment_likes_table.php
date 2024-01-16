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
        Schema::create('comment_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->boolean('is_like')->default(1);
            $table->timestamps();

            $table->index([
                'comment_id',
                'customer_id',
            ]);
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_likes');
    }
};
