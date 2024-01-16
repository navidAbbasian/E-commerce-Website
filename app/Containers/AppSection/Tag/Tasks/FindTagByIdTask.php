<?php

namespace App\Containers\AppSection\Tag\Tasks;

use App\Containers\AppSection\Tag\Data\Repositories\TagRepository;
use App\Containers\AppSection\Tag\Events\TagFoundByIdEvent;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTagByIdTask extends ParentTask
{
    public function __construct(
        protected TagRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Tag
    {
        try {
            $tag = $this->repository->find($id);
            TagFoundByIdEvent::dispatch($tag);

            return $tag;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
