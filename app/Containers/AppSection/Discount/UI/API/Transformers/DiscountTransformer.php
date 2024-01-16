<?php

namespace App\Containers\AppSection\Discount\UI\API\Transformers;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class DiscountTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Discount $discount): array
    {
        $response = [
            'object' => $discount->getResourceKey(),
            'id' => $discount->getHashedKey(),
            'shop_id' => $discount->encode($discount->shop_id),
            'customer_id' => $discount->encode($discount->customer_id),
            'title' => $discount->title,
            'value' => $discount->value,
            'started_at' => $discount->started_at,
            'ended_at' => $discount->ended_at,
            'min_buy' => $discount->min_buy,
            'max_discount' => $discount->max_discount,
            'type' => $discount->type,
            'is_percent' => $discount->is_percent,
            'quantity' => $discount->quantity,
            'remain' => $discount->remain,
        ];

        return $this->ifAdmin([
            'real_id' => $discount->id,
            'created_at' => $discount->created_at,
            'updated_at' => $discount->updated_at,
            'readable_created_at' => $discount->created_at->diffForHumans(),
            'readable_updated_at' => $discount->updated_at->diffForHumans(),
            // 'deleted_at' => $discount->deleted_at,
        ], $response);
    }
}
