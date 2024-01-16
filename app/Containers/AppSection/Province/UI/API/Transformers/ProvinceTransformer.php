<?php

namespace App\Containers\AppSection\Province\UI\API\Transformers;

use App\Containers\AppSection\Province\Models\Province;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ProvinceTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Province $province): array
    {
        $response = [
            'object' => $province->getResourceKey(),
            'id' => $province->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $province->id,
            'created_at' => $province->created_at,
            'updated_at' => $province->updated_at,
            'readable_created_at' => $province->created_at->diffForHumans(),
            'readable_updated_at' => $province->updated_at->diffForHumans(),
            // 'deleted_at' => $province->deleted_at,
        ], $response);
    }
}
