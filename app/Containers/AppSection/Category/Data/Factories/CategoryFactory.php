<?php

namespace App\Containers\AppSection\Category\Data\Factories;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CategoryFactory extends ParentFactory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
