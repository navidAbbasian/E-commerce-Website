<?php

namespace App\Containers\AppSection\Media\Tasks;

use App\Containers\AppSection\Media\Data\Repositories\MediaRepository;
use App\Containers\AppSection\Media\Events\MediaDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class DeleteMediaTask extends ParentTask
{
    public function __construct(
        protected MediaRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $image = $this->repository->find($id);
            if (Storage::disk('s3')->exists($image['directory'] . $image['filename'])) {
                Storage::disk('s3')->delete($image['directory'] . $image['filename']);
            }
            $result = $this->repository->delete($id);
            MediaDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
