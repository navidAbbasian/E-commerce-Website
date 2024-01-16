<?php

namespace App\Containers\AppSection\Slider\UI\API\Transformers;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SliderTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Slider $slider): array
    {
        $response = [
            'object' => $slider->getResourceKey(),
            'id' => $slider->getHashedKey(),
            'shop_id' => $slider->encode($slider->shop_id),
            'title' => $slider->title,
            'order' => $slider->order,
            'link' => $slider->link,
        ];

        return $this->ifAdmin([
            'real_id' => $slider->id,
            'created_at' => $slider->created_at,
            'updated_at' => $slider->updated_at,
            'readable_created_at' => $slider->created_at->diffForHumans(),
            'readable_updated_at' => $slider->updated_at->diffForHumans(),
            // 'deleted_at' => $slider->deleted_at,
        ], $response);
    }
}
