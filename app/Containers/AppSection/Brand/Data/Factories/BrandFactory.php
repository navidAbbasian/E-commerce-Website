<?php

namespace App\Containers\AppSection\Brand\Data\Factories;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class BrandFactory extends ParentFactory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
