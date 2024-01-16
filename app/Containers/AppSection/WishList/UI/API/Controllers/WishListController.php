<?php

namespace App\Containers\AppSection\WishList\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\WishList\Actions\CreateWishListAction;
use App\Containers\AppSection\WishList\Actions\DeleteWishListAction;
use App\Containers\AppSection\WishList\Actions\FindWishListByIdAction;
use App\Containers\AppSection\WishList\Actions\GetAllWishListsAction;
use App\Containers\AppSection\WishList\Actions\UpdateWishListAction;
use App\Containers\AppSection\WishList\UI\API\Requests\CreateWishListRequest;
use App\Containers\AppSection\WishList\UI\API\Requests\DeleteWishListRequest;
use App\Containers\AppSection\WishList\UI\API\Requests\FindWishListByIdRequest;
use App\Containers\AppSection\WishList\UI\API\Requests\GetAllWishListsRequest;
use App\Containers\AppSection\WishList\UI\API\Requests\UpdateWishListRequest;
use App\Containers\AppSection\WishList\UI\API\Transformers\WishListTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class WishListController extends ApiController
{
    /**
     * @param CreateWishListRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createWishList(CreateWishListRequest $request): JsonResponse
    {
        $wishlist = app(CreateWishListAction::class)->run($request);

        return $this->created($this->transform($wishlist, WishListTransformer::class));
    }

    /**
     * @param FindWishListByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findWishListById(FindWishListByIdRequest $request): array
    {
        $wishlist = app(FindWishListByIdAction::class)->run($request);

        return $this->transform($wishlist, WishListTransformer::class);
    }

    /**
     * @param GetAllWishListsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllWishLists(GetAllWishListsRequest $request): array
    {
        $wishlists = app(GetAllWishListsAction::class)->run($request);

        return $this->transform($wishlists, WishListTransformer::class);
    }

    /**
     * @param UpdateWishListRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateWishList(UpdateWishListRequest $request): array
    {
        $wishlist = app(UpdateWishListAction::class)->run($request);

        return $this->transform($wishlist, WishListTransformer::class);
    }

    /**
     * @param DeleteWishListRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteWishList(DeleteWishListRequest $request): JsonResponse
    {
        app(DeleteWishListAction::class)->run($request);

        return $this->noContent();
    }
}
