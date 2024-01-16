<?php

namespace App\Containers\AppSection\Cart\Tasks;

use App\Containers\AppSection\Cart\Data\Repositories\CartRepository;
use App\Containers\AppSection\Cart\Events\CartUpdatedEvent;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCartTask extends ParentTask
{
    public function __construct(
        protected CartRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Cart
    {
        try {
            $cart = $this->repository->update($data, $id);
            CartUpdatedEvent::dispatch($cart);

            return $cart;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
