<?php

namespace App\Containers\AppSection\Cart\UI\API\Transformers;

use App\Containers\AppSection\Cart\Models\CartItem;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CartItemTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(CartItem $cartItem): array
    {
        $response = [
            'object' => $cartItem->getResourceKey(),
            'id' => $cartItem->getHashedKey(),
            'cart_id' => $cartItem->encode($cartItem->cart_id),
            'product_id' => $cartItem->encode($cartItem->product_id),
        ];

        return $this->ifAdmin([
            'real_id' => $cartItem->id,
            'created_at' => $cartItem->created_at,
            'updated_at' => $cartItem->updated_at,
            'readable_created_at' => $cartItem->created_at->diffForHumans(),
            'readable_updated_at' => $cartItem->updated_at->diffForHumans(),
            // 'deleted_at' => $cartItem->deleted_at,
        ], $response);
    }
}
