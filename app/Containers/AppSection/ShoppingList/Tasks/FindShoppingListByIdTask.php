<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListRepository;
use App\Containers\AppSection\ShoppingList\Events\ShoppingListFoundByIdEvent;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindShoppingListByIdTask extends ParentTask
{
    public function __construct(
        protected ShoppingListRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ShoppingList
    {
        try {
            $shoppinglist = $this->repository->find($id);
            ShoppingListFoundByIdEvent::dispatch($shoppinglist);

            return $shoppinglist;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
