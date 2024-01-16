<?php

namespace App\Containers\AppSection\Comment\Data\Factories;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CommentFactory extends ParentFactory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
