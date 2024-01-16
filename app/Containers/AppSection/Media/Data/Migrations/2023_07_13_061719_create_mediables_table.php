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
        Schema::create('mediables', function (Blueprint $table) {
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('mediable_id');
            $table->string('mediable_type', 255);
            $table->string('tag', 100);

            $table->index([
                'media_id',
                'mediable_id',
                'tag',
            ]);
            $table->foreign('media_id')->references('id')->on('media')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediables');
    }
};
