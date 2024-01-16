<?php

namespace App\Containers\AppSection\Order\Tasks;

use App\Containers\AppSection\Order\Data\Repositories\OrderRepository;
use App\Containers\AppSection\Order\Events\OrderFoundByIdEvent;
use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindOrderByIdTask extends ParentTask
{
    public function __construct(
        protected OrderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Order
    {
        try {
            $order = $this->repository->find($id);
            OrderFoundByIdEvent::dispatch($order);

            return $order;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
