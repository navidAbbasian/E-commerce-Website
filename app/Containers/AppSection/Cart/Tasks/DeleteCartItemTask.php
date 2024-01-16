<?php

namespace App\Containers\AppSection\Cart\Tasks;

use App\Containers\AppSection\Cart\Data\Repositories\CartItemRepository;
use App\Containers\AppSection\Cart\Events\CartItemDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteCartItemTask extends ParentTask
{
    public function __construct(
        protected CartItemRepository $repository
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
            CartItemDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
