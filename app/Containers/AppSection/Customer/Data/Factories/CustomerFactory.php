<?php

namespace App\Containers\AppSection\Customer\Data\Factories;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CustomerFactory extends ParentFactory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
