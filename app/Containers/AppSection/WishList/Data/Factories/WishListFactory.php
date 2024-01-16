<?php

namespace App\Containers\AppSection\WishList\Data\Factories;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class WishListFactory extends ParentFactory
{
    protected $model = WishList::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
