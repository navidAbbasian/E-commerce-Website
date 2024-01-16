<?php

namespace App\Containers\AppSection\Order\Tasks;

use App\Containers\AppSection\Order\Data\Repositories\OrderRepository;
use App\Containers\AppSection\Order\Events\OrderCreatedEvent;
use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateOrderTask extends ParentTask
{
    public function __construct(
        protected OrderRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Order
    {
        try {

            $order = $this->repository->create($data);
            OrderCreatedEvent::dispatch($order);

            return $order;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
