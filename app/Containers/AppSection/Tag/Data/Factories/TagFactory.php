<?php

namespace App\Containers\AppSection\Tag\Data\Factories;

use App\Containers\AppSection\Tag\Models\Tag;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class TagFactory extends ParentFactory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
