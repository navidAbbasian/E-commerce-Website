<?php

namespace App\Containers\AppSection\Footer\UI\API\Transformers;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class FooterTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Footer $footer): array
    {
        $response = [
            'object' => $footer->getResourceKey(),
            'id' => $footer->getHashedKey(),
            'shop_id' => $footer->encode($footer->shop_id),
            'parent_id' => ($footer->parent_id) ? $footer->encode($footer->parent_id) : null,
            'title' => $footer->title,
            'link' => $footer->link,
            'order' => $footer->order,
        ];

        return $this->ifAdmin([
            'real_id' => $footer->id,
            'created_at' => $footer->created_at,
            'updated_at' => $footer->updated_at,
            'readable_created_at' => $footer->created_at->diffForHumans(),
            'readable_updated_at' => $footer->updated_at->diffForHumans(),
            // 'deleted_at' => $footer->deleted_at,
        ], $response);
    }
}
