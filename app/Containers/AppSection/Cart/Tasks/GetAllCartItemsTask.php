<?php

namespace App\Containers\AppSection\Cart\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Cart\Data\Repositories\CartItemRepository;
use App\Containers\AppSection\Cart\Events\CartItemsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCartItemsTask extends ParentTask
{
    public function __construct(
        protected CartItemRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        CartItemsListedEvent::dispatch($result);

        return $result;
    }
}
