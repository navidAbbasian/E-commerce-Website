<?php

namespace App\Containers\AppSection\Cart\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;

use App\Containers\AppSection\Cart\Actions\CreateCartItemAction;
use App\Containers\AppSection\Cart\Actions\DeleteCartItemAction;
use App\Containers\AppSection\Cart\Actions\FindCartItemByIdAction;
use App\Containers\AppSection\Cart\Actions\GetAllCartItemsAction;
use App\Containers\AppSection\Cart\Actions\UpdateCartItemAction;
use App\Containers\AppSection\Cart\UI\API\Requests\CreateCartItemRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\DeleteCartItemRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\FindCartItemByIdRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\GetAllCartItemsRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\UpdateCartItemRequest;
use App\Containers\AppSection\Cart\UI\API\Transformers\CartItemTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class CartItemController extends ApiController
{
    /**
     * @param  CreateCartItemRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createCartItem(CreateCartItemRequest $request): JsonResponse
    {
        $cart = app(CreateCartItemAction::class)->run($request);

        return $this->created($this->transform($cart, CartItemTransformer::class));
    }

    /**
     * @param FindCartItemByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCartItemById(FindCartItemByIdRequest $request): array
    {
        $cart = app(FindCartItemByIdAction::class)->run($request);

        return $this->transform($cart, CartItemTransformer::class);
    }

    /**
     * @param  GetAllCartItemsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCartItems(GetAllCartItemsRequest $request): array
    {
        $carts = app(GetAllCartItemsAction::class)->run($request);

        return $this->transform($carts, CartItemTransformer::class);
    }

    /**
     * @param  UpdateCartItemRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateCartItem(UpdateCartItemRequest $request): array
    {
        $cart = app(UpdateCartItemAction::class)->run($request);

        return $this->transform($cart, CartItemTransformer::class);
    }

    /**
     * @param  DeleteCartItemRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteCartItem(DeleteCartItemRequest $request): JsonResponse
    {
        app(DeleteCartItemAction::class)->run($request);

        return $this->noContent();
    }
}
