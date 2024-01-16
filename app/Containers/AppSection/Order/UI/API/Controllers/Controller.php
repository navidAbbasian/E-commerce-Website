<?php

namespace App\Containers\AppSection\Order\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Order\Actions\CreateOrderAction;
use App\Containers\AppSection\Order\Actions\DeleteOrderAction;
use App\Containers\AppSection\Order\Actions\FindOrderByIdAction;
use App\Containers\AppSection\Order\Actions\GetAllOrdersAction;
use App\Containers\AppSection\Order\Actions\UpdateOrderAction;
use App\Containers\AppSection\Order\UI\API\Requests\CreateOrderRequest;
use App\Containers\AppSection\Order\UI\API\Requests\DeleteOrderRequest;
use App\Containers\AppSection\Order\UI\API\Requests\FindOrderByIdRequest;
use App\Containers\AppSection\Order\UI\API\Requests\GetAllOrdersRequest;
use App\Containers\AppSection\Order\UI\API\Requests\UpdateOrderRequest;
use App\Containers\AppSection\Order\UI\API\Transformers\OrderTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createOrder(CreateOrderRequest $request): JsonResponse
    {
        $order = app(CreateOrderAction::class)->run($request);

        return $this->created($this->transform($order, OrderTransformer::class));
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findOrderById(FindOrderByIdRequest $request): array
    {
        $order = app(FindOrderByIdAction::class)->run($request);

        return $this->transform($order, (new OrderTransformer())->setDefaultIncludes(['orderItems', 'rajab']));
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllOrders(GetAllOrdersRequest $request): array
    {
        $orders = app(GetAllOrdersAction::class)->run($request);

        return $this->transform($orders, (new OrderTransformer())->setDefaultIncludes(['orderItems']));
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateOrder(UpdateOrderRequest $request): array
    {
        $order = app(UpdateOrderAction::class)->run($request);

        return $this->transform($order, OrderTransformer::class);
    }

    /**
     * @throws DeleteResourceFailedException
     */
    public function deleteOrder(DeleteOrderRequest $request): JsonResponse
    {
        app(DeleteOrderAction::class)->run($request);

        return $this->noContent();
    }
}
