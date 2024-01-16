<?php

namespace App\Containers\AppSection\WishList\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\WishList\Data\Repositories\WishListRepository;
use App\Containers\AppSection\WishList\Events\WishListsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllWishListsTask extends ParentTask
{
    public function __construct(
        protected WishListRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        WishListsListedEvent::dispatch($result);

        return $result;
    }
}
