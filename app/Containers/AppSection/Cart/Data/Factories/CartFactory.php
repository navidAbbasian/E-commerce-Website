<?php

namespace App\Containers\AppSection\Cart\Data\Factories;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CartFactory extends ParentFactory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
