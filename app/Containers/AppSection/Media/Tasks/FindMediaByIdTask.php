<?php

namespace App\Containers\AppSection\Media\Tasks;

use App\Containers\AppSection\Media\Data\Repositories\MediaRepository;
use App\Containers\AppSection\Media\Events\MediaFoundByIdEvent;
use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindMediaByIdTask extends ParentTask
{
    public function __construct(
        protected MediaRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Media
    {
        try {
            $media = $this->repository->find($id);
            MediaFoundByIdEvent::dispatch($media);

            return $media;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
