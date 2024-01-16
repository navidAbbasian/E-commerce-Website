<?php

namespace App\Containers\AppSection\Shop\UI\API\Transformers;

use App\Containers\AppSection\Shop\Models\Domain;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class DomainTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Domain $domain): array
    {
        $response = [
            'object' => $domain->getResourceKey(),
            'id' => $domain->getHashedKey(),
            'shop_id' => $domain->encode($domain->shop_id),
            'domain' => $domain->domain,
            'is_park' => $domain->is_park,
        ];

        return $this->ifAdmin([
            'real_id' => $domain->id,
            'created_at' => $domain->created_at,
            'updated_at' => $domain->updated_at,
            'readable_created_at' => $domain->created_at->diffForHumans(),
            'readable_updated_at' => $domain->updated_at->diffForHumans(),
            // 'deleted_at' => $domain->deleted_at,
        ], $response);
    }
}
