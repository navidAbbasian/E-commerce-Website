<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListRepository;
use App\Containers\AppSection\ShoppingList\Events\ShoppingListCreatedEvent;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateShoppingListTask extends ParentTask
{
    public function __construct(
        protected ShoppingListRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ShoppingList
    {
        try {
            $shoppinglist = $this->repository->create($data);
            ShoppingListCreatedEvent::dispatch($shoppinglist);

            return $shoppinglist;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
