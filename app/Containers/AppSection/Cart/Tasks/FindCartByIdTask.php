<?php

namespace App\Containers\AppSection\Cart\Tasks;

use App\Containers\AppSection\Cart\Data\Repositories\CartRepository;
use App\Containers\AppSection\Cart\Events\CartFoundByIdEvent;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCartByIdTask extends ParentTask
{
    public function __construct(
        protected CartRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Cart
    {
        try {
            $cart = $this->repository->find($id);
            CartFoundByIdEvent::dispatch($cart);

            return $cart;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
