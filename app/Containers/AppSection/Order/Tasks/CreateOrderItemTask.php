<?php

namespace App\Containers\AppSection\Order\Tasks;

use App\Containers\AppSection\Order\Data\Repositories\OrderItemRepository;
use App\Containers\AppSection\Order\Events\OrderItemCreatedEvent;
use App\Containers\AppSection\Order\Models\OrderItem;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateOrderItemTask extends ParentTask
{
    public function __construct(
        protected OrderItemRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($items, $order_id): OrderItem
    {
        try {
            for ($i = 0; $i < count($items); ++$i) {
                $items[$i]['order_id'] = $order_id;
            }

            foreach ($items as $item) {
                $orderitem = $this->repository->create($item);
            }
            //            OrderItemCreatedEvent::dispatch($orderitem);

            return $orderitem;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
