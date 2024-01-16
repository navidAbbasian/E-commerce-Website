<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListItemRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShoppingListItemsTask extends ParentTask
{
    public function __construct(
        protected ShoppingListItemRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        //        ShoppingListItemsListedEvent::dispatch($result);

        return $result;
    }
}
