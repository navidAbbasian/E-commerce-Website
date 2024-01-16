<?php

namespace App\Containers\AppSection\Carousel\Data\Factories;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CarouselFactory extends ParentFactory
{
    protected $model = Carousel::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
