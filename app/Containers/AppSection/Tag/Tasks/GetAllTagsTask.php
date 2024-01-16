<?php

namespace App\Containers\AppSection\Tag\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Tag\Data\Repositories\TagRepository;
use App\Containers\AppSection\Tag\Events\TagsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTagsTask extends ParentTask
{
    public function __construct(
        protected TagRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        TagsListedEvent::dispatch($result);

        return $result;
    }
}
