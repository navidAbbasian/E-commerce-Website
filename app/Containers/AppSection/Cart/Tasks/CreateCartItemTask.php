<?php

namespace App\Containers\AppSection\Cart\Tasks;

use App\Containers\AppSection\Cart\Data\Repositories\CartItemRepository;
use App\Containers\AppSection\Cart\Events\CartItemCreatedEvent;
use App\Containers\AppSection\Cart\Models\CartItem;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCartItemTask extends ParentTask
{
    public function __construct(
        protected CartItemRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): CartItem
    {
        try {
            $cartitem = $this->repository->create($data);
            CartItemCreatedEvent::dispatch($cartitem);

            return $cartitem;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
