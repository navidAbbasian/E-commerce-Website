<?php

namespace App\Containers\AppSection\WishList\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\WishList\Data\Repositories\WishListItemRepository;
use App\Containers\AppSection\WishList\Events\WishListItemsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllWishListItemsTask extends ParentTask
{
    public function __construct(
        protected WishListItemRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        WishListItemsListedEvent::dispatch($result);

        return $result;
    }
}
