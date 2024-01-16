<?php

namespace App\Containers\AppSection\Footer\Data\Factories;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class FooterFactory extends ParentFactory
{
    protected $model = Footer::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
