<?php

namespace App\Containers\AppSection\Discount\Data\Factories;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class DiscountFactory extends ParentFactory
{
    protected $model = Discount::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
