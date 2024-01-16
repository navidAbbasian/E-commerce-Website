<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;


use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListItemRepository;
use App\Containers\AppSection\ShoppingList\Models\ShoppingListItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateShoppingListItemTask extends ParentTask
{
    public function __construct(
        protected ShoppingListItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ShoppingListItem
    {
        try {
            $shoppinglistitem = $this->repository->update($data, $id);
//            ShoppingListItemUpdatedEvent::dispatch($photoshopping);

            return $shoppinglistitem;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
