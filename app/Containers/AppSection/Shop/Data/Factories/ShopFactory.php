<?php

namespace App\Containers\AppSection\Shop\Data\Factories;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ShopFactory extends ParentFactory
{
    protected $model = Shop::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
