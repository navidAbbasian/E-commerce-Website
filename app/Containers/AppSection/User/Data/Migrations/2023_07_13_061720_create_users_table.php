<?php

use App\Containers\AppSection\User\Enums\UserGenderEnum;
use App\Containers\AppSection\User\Enums\UserStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('father_name', 100)->nullable();
            $table->string('mobile', 11)->unique();
            $table->string('email', 100)->unique()->nullable();
            $table->string('national_code', 10)->nullable();
            $table->string('birth_certificate_number', 10)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->default(UserGenderEnum::NotSpecified->value);
            $table->date('birth')->nullable();
            $table->string('status')->default(UserStatusEnum::Active->value);
            $table->rememberToken();
            $table->timestamps();

            $table->index([
                'mobile',
                'email',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
