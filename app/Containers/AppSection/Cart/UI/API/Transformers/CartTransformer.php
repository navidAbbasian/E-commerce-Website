<?php

namespace App\Containers\AppSection\Cart\UI\API\Transformers;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CartTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Cart $cart): array
    {
        $response = [
            'object' => $cart->getResourceKey(),
            'id' => $cart->getHashedKey(),
            'shop_id' => $cart->encode($cart->shop_id),
            'customer_id' => $cart->encode($cart->customer_id),
        ];

        return $this->ifAdmin([
            'real_id' => $cart->id,
            'created_at' => $cart->created_at,
            'updated_at' => $cart->updated_at,
            'readable_created_at' => $cart->created_at->diffForHumans(),
            'readable_updated_at' => $cart->updated_at->diffForHumans(),
            // 'deleted_at' => $cart->deleted_at,
        ], $response);
    }
}
