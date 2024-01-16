<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListRepository;
use App\Containers\AppSection\ShoppingList\Events\ShoppingListsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShoppingListsTask extends ParentTask
{
    public function __construct(
        protected ShoppingListRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        ShoppingListsListedEvent::dispatch($result);

        return $result;
    }
}
