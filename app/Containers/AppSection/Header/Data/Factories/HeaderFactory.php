<?php

namespace App\Containers\AppSection\Header\Data\Factories;

use App\Containers\AppSection\Header\Models\Header;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class HeaderFactory extends ParentFactory
{
    protected $model = Header::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
