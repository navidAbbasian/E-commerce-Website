<?php

namespace App\Containers\AppSection\Order\UI\API\Transformers;

use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class OrderTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
//        'orderItems'
    ];

    public function transform(Order $order): array
    {
        $response = [
            'object' => $order->getResourceKey(),
            'id' => $order->getHashedKey(),
            'shop_id' => $order->encode($order->shop_id),
            'customer_id' => $order->encode($order->customer_id),
            'discount_id' => $order->encode($order->discount_id),
            'status' => $order->status,
            'price' => $order->price,
            'description' => $order->description,
        ];

        return $this->ifAdmin([
            'real_id' => $order->id,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
            'readable_created_at' => $order->created_at->diffForHumans(),
            'readable_updated_at' => $order->updated_at->diffForHumans(),
            // 'deleted_at' => $order->deleted_at,
        ], $response);
    }

    public function includeOrderItems(Order $order)
    {
        return $this->collection($order->orderItems, new OrderItemTransformer());
    }

}
