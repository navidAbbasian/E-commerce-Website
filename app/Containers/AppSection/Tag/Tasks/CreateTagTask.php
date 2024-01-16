<?php

namespace App\Containers\AppSection\Tag\Tasks;

use App\Containers\AppSection\Tag\Data\Repositories\TagRepository;
use App\Containers\AppSection\Tag\Events\TagCreatedEvent;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateTagTask extends ParentTask
{
    public function __construct(
        protected TagRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Tag
    {
        try {
            $tag = $this->repository->create($data);
            TagCreatedEvent::dispatch($tag);

            return $tag;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
