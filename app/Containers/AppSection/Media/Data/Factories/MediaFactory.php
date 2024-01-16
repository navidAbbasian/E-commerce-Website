<?php

namespace App\Containers\AppSection\Media\Data\Factories;

use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class MediaFactory extends ParentFactory
{
    protected $model = Media::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
