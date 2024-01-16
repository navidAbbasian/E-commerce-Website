<?php

namespace App\Containers\AppSection\Cart\Tasks;

use App\Containers\AppSection\Cart\Data\Repositories\CartRepository;
use App\Containers\AppSection\Cart\Events\CartCreatedEvent;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCartTask extends ParentTask
{
    public function __construct(
        protected CartRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Cart
    {
        try {
            $cart = $this->repository->create($data);
            CartCreatedEvent::dispatch($cart);

            return $cart;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
