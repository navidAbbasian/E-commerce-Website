<?php

namespace App\Containers\AppSection\Order\Tasks;

use App\Containers\AppSection\Order\Data\Repositories\OrderItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateOrderItemTask extends ParentTask
{
    public function __construct(
        protected OrderItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run($items, $id)
    {
        try {
            $orderitems = $this->repository->where('order_id', $id)->get();

            for ($i = 0; $i < count($orderitems); ++$i) {
                $orderitems[$i]['product_id'] = $items[$i]['product_id'];
                $orderitems[$i]['quantity'] = $items[$i]['quantity'];
                $orderitems[$i]['price'] = $items[$i]['price'];

                $orderitems[$i]->save();
            }
            //            $orderitem = $this->repository->update($data, $id);
            //            OrderItemUpdatedEvent::dispatch($orderitems);

            return $orderitems;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
