<?php

namespace App\Containers\AppSection\Carousel\UI\API\Transformers;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CarouselTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Carousel $carousel): array
    {
        $response = [
            'object' => $carousel->getResourceKey(),
            'id' => $carousel->getHashedKey(),
            'shop_id' => $carousel->encode($carousel->shop_id),
            'category_id' => $carousel->encode($carousel->category_id),
            'title' => $carousel->title,
            'order' => $carousel->order,
            'type' => $carousel->type,
        ];

        return $this->ifAdmin([
            'real_id' => $carousel->id,
            'created_at' => $carousel->created_at,
            'updated_at' => $carousel->updated_at,
            'readable_created_at' => $carousel->created_at->diffForHumans(),
            'readable_updated_at' => $carousel->updated_at->diffForHumans(),
            // 'deleted_at' => $carousel->deleted_at,
        ], $response);
    }
}
