<?php

namespace App\Containers\AppSection\WishList\UI\API\Transformers;

use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class WishListItemTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(WishListItem $wishlistitem): array
    {
        $response = [
            'object' => $wishlistitem->getResourceKey(),
            'id' => $wishlistitem->getHashedKey(),
            'wish_list_id' => $wishlistitem->encode($wishlistitem->wish_list_id),
            'product_id' => $wishlistitem->encode($wishlistitem->product_id),
        ];

        return $this->ifAdmin([
            'real_id' => $wishlistitem->id,
            'created_at' => $wishlistitem->created_at,
            'updated_at' => $wishlistitem->updated_at,
            'readable_created_at' => $wishlistitem->created_at->diffForHumans(),
            'readable_updated_at' => $wishlistitem->updated_at->diffForHumans(),
            // 'deleted_at' => $wishlistitem->deleted_at,
        ], $response);
    }
}
