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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_media_id');
            $table->string('disk', 10);
            $table->string('directory', 100);
            $table->string('filename', 255);
            $table->string('mime_type', 50);
            $table->integer('size');
            $table->string('alt', 255);
            $table->string('title', 255);
            $table->string('variant_name', 50);
            $table->string('upload_via', 50);
            $table->timestamps();

            $table->index([
                'original_media_id',
            ]);
            $table->foreign('original_media_id')->references('id')->on('media')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
