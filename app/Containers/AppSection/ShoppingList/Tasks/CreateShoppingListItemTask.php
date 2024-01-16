<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListItemRepository;
use App\Containers\AppSection\ShoppingList\Models\ShoppingListItem;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateShoppingListItemTask extends ParentTask
{
    public function __construct(
        protected ShoppingListItemRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ShoppingListItem
    {
        try {
            $shoppinglistitem = $this->repository->create($data);
            //            ShoppingListItemCreatedEvent::dispatch($shoppinglistitem);

            return $shoppinglistitem;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
