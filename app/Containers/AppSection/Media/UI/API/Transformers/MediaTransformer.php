<?php

namespace App\Containers\AppSection\Media\UI\API\Transformers;

use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class MediaTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
    ];

    protected array $availableIncludes = [
    ];

    public function transform(Media $media): array
    {
        $response = [
            'object' => $media->getResourceKey(),
            'id' => $media->getHashedKey(),
            'disk' => $media->disk,
            'directory' => $media->directory,
            'filename' => $media->filename,
            'mime_type' => $media->mime_type,
            'size' => $media->size,
            'alt' => $media->alt,
            'title' => $media->title,
            'variant_name' => $media->variant_name,
            'upload_via' => $media->upload_via,
        ];

        return $this->ifAdmin([
            'real_id' => $media->id,
            'created_at' => $media->created_at,
            'updated_at' => $media->updated_at,
            'readable_created_at' => $media->created_at->diffForHumans(),
            'readable_updated_at' => $media->updated_at->diffForHumans(),
            // 'deleted_at' => $media->deleted_at,
        ], $response);
    }

    public function includeParent(Media $media)
    {
        if (null != $media->parent) {
            return $this->collection($media->children, new MediaTransformer());
        } else {
            return;
        }
    }

    public function includeChilderen(Media $media)
    {
        if (null != $media->children) {
            return $this->item($media->parent, new MediaTransformer());
        } else {
            return;
        }
    }
}
