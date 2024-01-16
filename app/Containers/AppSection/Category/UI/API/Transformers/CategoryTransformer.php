<?php

namespace App\Containers\AppSection\Category\UI\API\Transformers;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CategoryTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Category $category): array
    {
        $response = [
            'object' => $category->getResourceKey(),
            'id' => $category->getHashedKey(),
            'shop_id' => $category->encode($category->shop_id),
            'parent_id' => ($category->parent_id) ? $category->encode($category->parent_id) : null,
            'title' => $category->title,
            'meta_title' => $category->meta_title,
            'description' => $category->description,
            'meta_description' => $category->meta_description,
            'order' => $category->order,
        ];

        return $this->ifAdmin([
            'real_id' => $category->id,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'readable_created_at' => $category->created_at->diffForHumans(),
            'readable_updated_at' => $category->updated_at->diffForHumans(),
            // 'deleted_at' => $category->deleted_at,
        ], $response);
    }
}
