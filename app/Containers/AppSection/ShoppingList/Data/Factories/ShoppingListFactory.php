<?php

namespace App\Containers\AppSection\ShoppingList\Data\Factories;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ShoppingListFactory extends ParentFactory
{
    protected $model = ShoppingList::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
