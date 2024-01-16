<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Transformers;

use App\Containers\AppSection\ShoppingList\Models\ShoppingListItem;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ShoppingListItemTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ShoppingListItem $shoppingListItem): array
    {
        $response = [
            'object' => $shoppingListItem->getResourceKey(),
            'id' => $shoppingListItem->getHashedKey(),
            'shopping_list_id' => $shoppingListItem->encode($shoppingListItem->shopping_list_id),
            'product_id' => $shoppingListItem->encode($shoppingListItem->product_id),

        ];

        return $this->ifAdmin([
            'real_id' => $shoppingListItem->id,
            'created_at' => $shoppingListItem->created_at,
            'updated_at' => $shoppingListItem->updated_at,
            'readable_created_at' => $shoppingListItem->created_at->diffForHumans(),
            'readable_updated_at' => $shoppingListItem->updated_at->diffForHumans(),
            // 'deleted_at' => $shoppingListItem->deleted_at,
        ], $response);
    }
}
