<?php

use App\Containers\AppSection\Customer\Enums\CustomerGenderEnum;
use App\Containers\AppSection\Customer\Enums\CustomerStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('mobile', 11);
            $table->string('phone', 11)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('national_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->default(CustomerGenderEnum::NotSpecified->value);
            $table->date('birth')->nullable();
            $table->boolean('newsletter')->default(0);
            $table->integer('score')->default(0);
            $table->string('refund_card', 16)->nullable();
            $table->string('referral_link')->nullable();
            $table->string('status')->default(CustomerStatusEnum::Active->value);
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
        Schema::dropIfExists('customers');
    }
};
