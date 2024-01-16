<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListItemRepository;
use App\Containers\AppSection\ShoppingList\Models\ShoppingListItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindShoppingListItemByIdTask extends ParentTask
{
    public function __construct(
        protected ShoppingListItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ShoppingListItem
    {
        try {
            $shoppinglistitem = $this->repository->find($id);
            //            ShoppingListItemFoundByIdEvent::dispatch($shoppinglistitem);

            return $shoppinglistitem;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
