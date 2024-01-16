<?php

namespace App\Containers\AppSection\Banner\UI\API\Transformers;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Shop\UI\API\Transformers\ShopTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;

class BannerTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Banner $banner): array
    {
        $response = [
            'object' => $banner->getResourceKey(),
            'id' => $banner->getHashedKey(),
            'shop_id' => $banner->encode($banner->shop_id),
            'title' => $banner->title,
            'alt' => $banner->alt,
            'link' => $banner->link,
            'order' => $banner->order,
            'column' => $banner->column,
            'page' => $banner->page,
            'situation' => $banner->situation,
            'position' => $banner->position,
            'status' => $banner->status,
        ];

        return $this->ifAdmin([
            'real_id' => $banner->id,
            'created_at' => $banner->created_at,
            'updated_at' => $banner->updated_at,
            'readable_created_at' => $banner->created_at->diffForHumans(),
            'readable_updated_at' => $banner->updated_at->diffForHumans(),
            // 'deleted_at' => $banner->deleted_at,
        ], $response);
    }

    public function includeShop(Banner $banner): Item
    {
        return $this->item($banner->shop, new ShopTransformer());
    }

}
