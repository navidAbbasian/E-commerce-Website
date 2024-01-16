<?php

namespace App\Containers\AppSection\Slider\Data\Factories;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class SliderFactory extends ParentFactory
{
    protected $model = Slider::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
