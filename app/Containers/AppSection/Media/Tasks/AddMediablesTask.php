<?php

namespace App\Containers\AppSection\Media\Tasks;

use App\Containers\AppSection\Media\Data\Repositories\MediablesRepository;
use App\Containers\AppSection\Media\Models\Mediables;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class AddMediablesTask extends ParentTask
{
    public function __construct(
        protected MediablesRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($mediaId, $mediableId, $mediableType, $tag): Mediables
    {
        try {
            $array = [
                'media_id' => $mediaId,
                'mediable_id' => $mediableId,
                'mediable_type' => $mediableType,
                'tag' => $tag,
            ];

            return $this->repository->create($array);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
