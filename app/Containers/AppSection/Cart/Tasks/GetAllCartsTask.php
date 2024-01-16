<?php

namespace App\Containers\AppSection\Cart\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Cart\Data\Repositories\CartRepository;
use App\Containers\AppSection\Cart\Events\CartsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCartsTask extends ParentTask
{
    public function __construct(
        protected CartRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        CartsListedEvent::dispatch($result);

        return $result;
    }
}
