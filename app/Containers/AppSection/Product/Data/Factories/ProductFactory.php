<?php

namespace App\Containers\AppSection\Product\Data\Factories;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ProductFactory extends ParentFactory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
