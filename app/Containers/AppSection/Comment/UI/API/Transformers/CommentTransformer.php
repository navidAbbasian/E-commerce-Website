<?php

namespace App\Containers\AppSection\Comment\UI\API\Transformers;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CommentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Comment $comment): array
    {
        $response = [
            'object' => $comment->getResourceKey(),
            'id' => $comment->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $comment->id,
            'created_at' => $comment->created_at,
            'updated_at' => $comment->updated_at,
            'readable_created_at' => $comment->created_at->diffForHumans(),
            'readable_updated_at' => $comment->updated_at->diffForHumans(),
            // 'deleted_at' => $comment->deleted_at,
        ], $response);
    }
}
