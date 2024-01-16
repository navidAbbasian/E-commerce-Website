<?php

namespace App\Containers\AppSection\Category\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoriesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCategoriesTask extends ParentTask
{
    public function __construct(
        protected CategoryRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        CategoriesListedEvent::dispatch($result);

        return $result;
    }
}
