<?php

namespace App\Containers\AppSection\ShoppingList\Tasks;

use App\Containers\AppSection\ShoppingList\Data\Repositories\ShoppingListRepository;
use App\Containers\AppSection\ShoppingList\Events\ShoppingListDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteShoppingListTask extends ParentTask
{
    public function __construct(
        protected ShoppingListRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            ShoppingListDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
