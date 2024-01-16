<?php

namespace App\Containers\AppSection\Order\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\UpdateOrderItemTask;
use App\Containers\AppSection\Order\Tasks\UpdateOrderTask;
use App\Containers\AppSection\Order\UI\API\Requests\UpdateOrderRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateOrderAction extends ParentAction
{
    public function __construct(
        private readonly UpdateOrderTask $updateOrderTask,
        private readonly UpdateOrderItemTask $updateOrderItemTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateOrderRequest $request): Order
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'customer_id',
            'discount_id',
            'status',
            'price',
            'description',
            'items',
        ]);

        $items = $data['items'];
        unset($data['items']);

        $order = $this->updateOrderTask->run($data, $request->id);

        $this->updateOrderItemTask->run($items, $request->id);

        return $order;
    }
}
