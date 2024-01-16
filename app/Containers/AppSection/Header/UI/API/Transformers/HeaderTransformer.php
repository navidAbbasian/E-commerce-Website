<?php

namespace App\Containers\AppSection\Header\UI\API\Transformers;

use App\Containers\AppSection\Header\Models\Header;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class HeaderTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Header $header): array
    {
        $response = [
            'object' => $header->getResourceKey(),
            'id' => $header->getHashedKey(),
            'shop_id' => $header->encode($header->shop_id),
            'title' => $header->title,
            'link' => $header->link,
            'order' => $header->order,
        ];

        return $this->ifAdmin([
            'real_id' => $header->id,
            'created_at' => $header->created_at,
            'updated_at' => $header->updated_at,
            'readable_created_at' => $header->created_at->diffForHumans(),
            'readable_updated_at' => $header->updated_at->diffForHumans(),
            // 'deleted_at' => $header->deleted_at,
        ], $response);
    }
}
