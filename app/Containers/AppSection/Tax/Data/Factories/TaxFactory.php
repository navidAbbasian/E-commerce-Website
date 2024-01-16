<?php

namespace App\Containers\AppSection\Tax\Data\Factories;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class TaxFactory extends ParentFactory
{
    protected $model = Tax::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
