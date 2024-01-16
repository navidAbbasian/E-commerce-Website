<?php

namespace App\Containers\AppSection\Order\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\CreateOrderItemTask;
use App\Containers\AppSection\Order\Tasks\CreateOrderTask;
use App\Containers\AppSection\Order\UI\API\Requests\CreateOrderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateOrderAction extends ParentAction
{
    public function __construct(
        private readonly CreateOrderTask $createOrderTask,
        private readonly CreateOrderItemTask $createOrderItemTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateOrderRequest $request): Order
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shop_id',
            'customer_id',
            'discount_id',
            'status',
            'price',
            'description',
            'items',
        ]);
        $items = $data['items'];
        unset($data['items']);

        $order = $this->createOrderTask->run($data);

        $this->createOrderItemTask->run($items, $order->id);

        return $order;
    }
}
