<?php

namespace App\Containers\AppSection\Order\Tasks;

use App\Containers\AppSection\Order\Data\Repositories\OrderRepository;
use App\Containers\AppSection\Order\Events\OrderUpdatedEvent;
use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateOrderTask extends ParentTask
{
    public function __construct(
        protected OrderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Order
    {
        try {
            $order = $this->repository->update($data, $id);
            OrderUpdatedEvent::dispatch($order);

            return $order;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
