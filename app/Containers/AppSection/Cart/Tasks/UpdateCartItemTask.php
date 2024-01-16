<?php

namespace App\Containers\AppSection\Cart\Tasks;

use App\Containers\AppSection\Cart\Data\Repositories\CartItemRepository;
use App\Containers\AppSection\Cart\Events\CartItemUpdatedEvent;
use App\Containers\AppSection\Cart\Models\CartItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCartItemTask extends ParentTask
{
    public function __construct(
        protected CartItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): CartItem
    {
        try {
            $cartitem = $this->repository->update($data, $id);
            CartItemUpdatedEvent::dispatch($cartitem);

            return $cartitem;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
