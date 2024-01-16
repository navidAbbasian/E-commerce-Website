<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListRepository;
use App\Containers\AppSection\ShoppingList\Events\ShoppingListUpdatedEvent;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateShoppingListTask extends ParentTask
{
    public function __construct(
        protected ShoppingListRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ShoppingList
    {
        try {
            $shoppinglist = $this->repository->update($data, $id);
            ShoppingListUpdatedEvent::dispatch($shoppinglist);

            return $shoppinglist;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
