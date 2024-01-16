<?php

namespace App\Containers\AppSection\Banner\Data\Factories;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class BannerFactory extends ParentFactory
{
    protected $model = Banner::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
