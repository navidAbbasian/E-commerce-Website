<?php

namespace App\Containers\AppSection\Tag\Tasks;

use App\Containers\AppSection\Tag\Data\Repositories\TagRepository;
use App\Containers\AppSection\Tag\Events\TagUpdatedEvent;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateTagTask extends ParentTask
{
    public function __construct(
        protected TagRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Tag
    {
        try {
            $tag = $this->repository->update($data, $id);
            TagUpdatedEvent::dispatch($tag);

            return $tag;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
