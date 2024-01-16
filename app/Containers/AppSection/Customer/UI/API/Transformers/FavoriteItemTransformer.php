<?php

namespace App\Containers\AppSection\Customer\UI\API\Transformers;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Shop\UI\API\Transformers\ShopTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class FavoriteItemTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
    ];

    protected array $availableIncludes = [
    ];

    public function transform(Customer $customer): array
    {
        $response = [
            'object' => $customer->getResourceKey(),
            'id' => $customer->getHashedKey(),
            'shop_id' => $customer->encode($customer->shop_id),

        ];

        return $this->ifAdmin([
            'real_id' => $customer->id,
            'created_at' => $customer->created_at,
            'updated_at' => $customer->updated_at,
            'readable_created_at' => $customer->created_at->diffForHumans(),
            'readable_updated_at' => $customer->updated_at->diffForHumans(),
            // 'deleted_at' => $customer->deleted_at,
        ], $response);
    }



}
