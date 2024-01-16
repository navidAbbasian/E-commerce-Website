<?php

namespace App\Containers\AppSection\Shop\UI\API\Transformers;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ShopTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Shop $shop): array
    {
        $response = [
            'object' => $shop->getResourceKey(),
            'id' => $shop->getHashedKey(),
            'user_id' => $shop->encode($shop->user_id),
            'title' => $shop->title,
            'meta_title' => $shop->meta_title,
            'description' => $shop->description,
            'meta_description' => $shop->meta_description,
            'address' => $shop->address,
            'email' => $shop->email,
            'area_code' => $shop->area_code,
            'phone' => $shop->phone,
            'score_worth' => $shop->score_worth,
        ];

        return $this->ifAdmin([
            'real_id' => $shop->id,
            'created_at' => $shop->created_at,
            'updated_at' => $shop->updated_at,
            'readable_created_at' => $shop->created_at->diffForHumans(),
            'readable_updated_at' => $shop->updated_at->diffForHumans(),
            // 'deleted_at' => $shop->deleted_at,
        ], $response);
    }
}
