<?php

namespace App\Containers\AppSection\Cart\Tasks;

use App\Containers\AppSection\Cart\Data\Repositories\CartItemRepository;
use App\Containers\AppSection\Cart\Events\CartItemFoundByIdEvent;
use App\Containers\AppSection\Cart\Models\CartItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCartItemByIdTask extends ParentTask
{
    public function __construct(
        protected CartItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): CartItem
    {
        try {
            $cartitem = $this->repository->find($id);
            CartItemFoundByIdEvent::dispatch($cartitem);

            return $cartitem;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
