<?php

namespace App\Containers\AppSection\VerificationCode\Data\Factories;

use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class VerificationCodeFactory extends ParentFactory
{
    protected $model = VerificationCode::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
