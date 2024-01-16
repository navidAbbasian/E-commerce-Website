<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use App\Containers\AppSection\User\Models\UserAddress;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class UserAddressTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(UserAddress $useraddress): array
    {
        $response = [
            'object' => $useraddress->getResourceKey(),
            'id' => $useraddress->getHashedKey(),
            'user_id' => $useraddress->encode($useraddress->user_id),
            'city_id' => $useraddress->encode($useraddress->city_id),
            'address' => $useraddress->address,
            'zipcode' => $useraddress->zipcode,
        ];

        return $this->ifAdmin([
            'real_id' => $useraddress->id,
            'created_at' => $useraddress->created_at,
            'updated_at' => $useraddress->updated_at,
            'readable_created_at' => $useraddress->created_at->diffForHumans(),
            'readable_updated_at' => $useraddress->updated_at->diffForHumans(),
            // 'deleted_at' => $useraddress->deleted_at,
        ], $response);
    }
}
