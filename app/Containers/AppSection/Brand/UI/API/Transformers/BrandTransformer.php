<?php

namespace App\Containers\AppSection\Brand\UI\API\Transformers;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Containers\AppSection\Shop\UI\API\Transformers\ShopTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class BrandTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Brand $brand): array
    {
        $response = [
            'object' => $brand->getResourceKey(),
            'id' => $brand->getHashedKey(),
            'shop_id' => $brand->encode($brand->shop_id),
            'title' => $brand->title,
            'meta_title' => $brand->meta_title,
            'description' => $brand->description,
            'meta_description' => $brand->meta_description,
        ];

        return $this->ifAdmin([
            'real_id' => $brand->id,
            'created_at' => $brand->created_at,
            'updated_at' => $brand->updated_at,
            'readable_created_at' => $brand->created_at->diffForHumans(),
            'readable_updated_at' => $brand->updated_at->diffForHumans(),
            // 'deleted_at' => $brand->deleted_at,
        ], $response);
    }

    public function includeShop(Brand $brand)
    {
        return $this->item($brand->shop, new ShopTransformer());
    }

    public function includeProducts(Brand $brand)
    {
        return $this->item($brand->products, new ProductTransformer());
    }
}
