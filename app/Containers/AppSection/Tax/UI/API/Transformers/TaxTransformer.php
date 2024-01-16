<?php

namespace App\Containers\AppSection\Tax\UI\API\Transformers;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TaxTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Tax $tax): array
    {
        $response = [
            'object' => $tax->getResourceKey(),
            'id' => $tax->getHashedKey(),
            'shop_id' => $tax->encode($tax->shop_id),
            'title' => $tax->title,
            'percent' => $tax->percent,
        ];

        return $this->ifAdmin([
            'real_id' => $tax->id,
            'created_at' => $tax->created_at,
            'updated_at' => $tax->updated_at,
            'readable_created_at' => $tax->created_at->diffForHumans(),
            'readable_updated_at' => $tax->updated_at->diffForHumans(),
            // 'deleted_at' => $tax->deleted_at,
        ], $response);
    }
}
