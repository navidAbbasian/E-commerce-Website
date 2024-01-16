<?php

namespace App\Containers\AppSection\Customer\UI\API\Transformers;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Containers\AppSection\Province\UI\API\Transformers\CityTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CustomerAddressTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
    ];

    protected array $availableIncludes = [
    ];

    public function transform(CustomerAddress $customerAddress): array
    {
        $response = [
            'object' => $customerAddress->getResourceKey(),
            'id' => $customerAddress->getHashedKey(),
            'customer_id' => $customerAddress->encode($customerAddress->customer_id),
            'city_id' => $customerAddress->encode($customerAddress->city_id),
            'fullname' => $customerAddress->fullname,
            'address' => $customerAddress->address,
            'zipcode' => $customerAddress->zipcode,
            'floor' => $customerAddress->floor,
            'unit' => $customerAddress->unit,
            'number' => $customerAddress->number,
            'mobile' => $customerAddress->mobile,
            'phone' => $customerAddress->phone,
        ];

        return $this->ifAdmin([
            'real_id' => $customerAddress->id,
            'created_at' => $customerAddress->created_at,
            'updated_at' => $customerAddress->updated_at,
            'readable_created_at' => $customerAddress->created_at->diffForHumans(),
            'readable_updated_at' => $customerAddress->updated_at->diffForHumans(),
            // 'deleted_at' => $customerAddress->deleted_at,
        ], $response);
    }

    public function includeCustomer(Customer $customer)
    {
        return $this->item($customer->customer, new CustomerTransformer());
    }
    public function includeCity(Customer $customer)
    {
        return $this->item($customer->city, new CityTransformer());
    }
}
