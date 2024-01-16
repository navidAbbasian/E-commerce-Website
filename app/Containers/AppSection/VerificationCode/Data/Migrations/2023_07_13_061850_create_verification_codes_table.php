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
        Schema::create('verification_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_type', 100);
            $table->string('code', 6);
            $table->timestamp('expires_in');
            $table->longText('message');
            $table->string('type');
            $table->string('sent_by');
            $table->boolean('is_used')->default(0);
            $table->timestamps();
            // $table->softDeletes();

            $table->index([
                'receiver_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_codes');
    }
};
