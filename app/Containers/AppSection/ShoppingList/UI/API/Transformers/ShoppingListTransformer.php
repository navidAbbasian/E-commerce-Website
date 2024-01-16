<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Transformers;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ShoppingListTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ShoppingList $shoppinglist): array
    {
        $response = [
            'object' => $shoppinglist->getResourceKey(),
            'id' => $shoppinglist->getHashedKey(),
            'shop_id' => $shoppinglist->encode($shoppinglist->shop_id),
            'customer_id' => $shoppinglist->customer_id,
            'name' => $shoppinglist->name,
        ];

        return $this->ifAdmin([
            'real_id' => $shoppinglist->id,
            'created_at' => $shoppinglist->created_at,
            'updated_at' => $shoppinglist->updated_at,
            'readable_created_at' => $shoppinglist->created_at->diffForHumans(),
            'readable_updated_at' => $shoppinglist->updated_at->diffForHumans(),
            // 'deleted_at' => $shoppinglist->deleted_at,
        ], $response);
    }
}
