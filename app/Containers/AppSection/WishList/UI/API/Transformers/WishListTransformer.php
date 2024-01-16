<?php

namespace App\Containers\AppSection\WishList\UI\API\Transformers;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class WishListTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(WishList $wishlist): array
    {
        $response = [
            'object' => $wishlist->getResourceKey(),
            'id' => $wishlist->getHashedKey(),
            'shop_id' => $wishlist->encode($wishlist->shop_id),
            'customer_id' => $wishlist->encode($wishlist->customer_id),
        ];

        return $this->ifAdmin([
            'real_id' => $wishlist->id,
            'created_at' => $wishlist->created_at,
            'updated_at' => $wishlist->updated_at,
            'readable_created_at' => $wishlist->created_at->diffForHumans(),
            'readable_updated_at' => $wishlist->updated_at->diffForHumans(),
            // 'deleted_at' => $wishlist->deleted_at,
        ], $response);
    }
}
