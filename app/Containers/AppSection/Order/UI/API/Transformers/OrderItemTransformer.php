<?php

namespace App\Containers\AppSection\Order\UI\API\Transformers;

use App\Containers\AppSection\Order\Models\OrderItem;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class OrderItemTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
    ];

    protected array $availableIncludes = [
//        'product',
    ];

    public function transform(OrderItem $orderitem): array
    {
        $response = [
            'object' => $orderitem->getResourceKey(),
            'id' => $orderitem->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $orderitem->id,
            'created_at' => $orderitem->created_at,
            'updated_at' => $orderitem->updated_at,
            'readable_created_at' => $orderitem->created_at->diffForHumans(),
            'readable_updated_at' => $orderitem->updated_at->diffForHumans(),
            // 'deleted_at' => $orderitem->deleted_at,
        ], $response);
    }

    public function includeOrder(OrderItem $orderItem)
    {
        return $this->item($orderItem->order, new OrderTransformer());
    }

    public function includeProduct(OrderItem $orderItem)
    {
        return $this->item($orderItem->product, new ProductTransformer());
    }
}
