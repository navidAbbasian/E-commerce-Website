<?php

namespace App\Containers\AppSection\Cart\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Cart\Actions\CreateCartAction;
use App\Containers\AppSection\Cart\Actions\DeleteCartAction;
use App\Containers\AppSection\Cart\Actions\FindCartByIdAction;
use App\Containers\AppSection\Cart\Actions\GetAllCartsAction;
use App\Containers\AppSection\Cart\Actions\UpdateCartAction;
use App\Containers\AppSection\Cart\UI\API\Requests\CreateCartRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\DeleteCartRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\FindCartByIdRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\GetAllCartsRequest;
use App\Containers\AppSection\Cart\UI\API\Requests\UpdateCartRequest;
use App\Containers\AppSection\Cart\UI\API\Transformers\CartTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class CartController extends ApiController
{
    /**
     * @param CreateCartRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createCart(CreateCartRequest $request): JsonResponse
    {
        $cart = app(CreateCartAction::class)->run($request);

        return $this->created($this->transform($cart, CartTransformer::class));
    }

    /**
     * @param FindCartByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCartById(FindCartByIdRequest $request): array
    {
        $cart = app(FindCartByIdAction::class)->run($request);

        return $this->transform($cart, CartTransformer::class);
    }

    /**
     * @param GetAllCartsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCarts(GetAllCartsRequest $request): array
    {
        $carts = app(GetAllCartsAction::class)->run($request);

        return $this->transform($carts, CartTransformer::class);
    }

    /**
     * @param UpdateCartRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateCart(UpdateCartRequest $request): array
    {
        $cart = app(UpdateCartAction::class)->run($request);

        return $this->transform($cart, CartTransformer::class);
    }

    /**
     * @param DeleteCartRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteCart(DeleteCartRequest $request): JsonResponse
    {
        app(DeleteCartAction::class)->run($request);

        return $this->noContent();
    }
}
