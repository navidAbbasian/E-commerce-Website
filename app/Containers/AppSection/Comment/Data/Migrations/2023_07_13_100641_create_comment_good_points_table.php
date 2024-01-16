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
        Schema::create('comment_good_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->longText('body');
            $table->timestamps();

            $table->index([
                'comment_id',
            ]);
            $table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_good_points');
    }
};
