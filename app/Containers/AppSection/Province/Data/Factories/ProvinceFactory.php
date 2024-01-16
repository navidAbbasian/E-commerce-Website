<?php

namespace App\Containers\AppSection\Province\Data\Factories;

use App\Containers\AppSection\Province\Models\Province;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ProvinceFactory extends ParentFactory
{
    protected $model = Province::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
