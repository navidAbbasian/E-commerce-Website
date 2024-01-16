<?php

namespace App\Containers\AppSection\Media\Tasks;

use App\Containers\AppSection\Media\Data\Repositories\MediaRepository;
use App\Containers\AppSection\Media\Events\MediaCreatedEvent;
use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Storage;

class CreateMediaTask extends ParentTask
{
    public function __construct(
        protected MediaRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($file, $originalMediaId, $disk = 's3', $directory, $filename, $mime, $size, $alt, $title, $variantName, $uploadVia): Media
    {
        try {
            $filename = time() . $filename;
            Storage::disk($disk)->put($directory . $filename, $file);

            $array = [
                'original_media_id' => $originalMediaId,
                'disk' => $disk,
                'directory' => $directory,
                'filename' => $filename,
                'mime_type' => $mime,
                'size' => $size,
                'alt' => $alt,
                'title' => $title,
                'variant_name' => $variantName,
                'upload_via' => $uploadVia,
            ];
            $media = $this->repository->create($array);
            MediaCreatedEvent::dispatch($media);

            return $media;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
