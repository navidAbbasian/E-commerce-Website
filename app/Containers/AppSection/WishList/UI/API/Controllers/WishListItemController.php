<?php

namespace App\Containers\AppSection\WishList\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\WishList\Actions\CreateWishListItemAction;
use App\Containers\AppSection\WishList\Actions\DeleteWishListItemAction;
use App\Containers\AppSection\WishList\Actions\FindWishListItemByIdAction;
use App\Containers\AppSection\WishList\Actions\GetAllWishListItemsAction;
use App\Containers\AppSection\WishList\Actions\UpdateWishListItemAction;
use App\Containers\AppSection\WishList\UI\API\Requests\CreateWishListItemRequest;

use App\Containers\AppSection\WishList\UI\API\Requests\DeleteWishListItemRequest;
use App\Containers\AppSection\WishList\UI\API\Requests\FindWishListItemByIdRequest;
use App\Containers\AppSection\WishList\UI\API\Requests\GetAllWishListItemsRequest;
use App\Containers\AppSection\WishList\UI\API\Requests\UpdateWishListItemRequest;
use App\Containers\AppSection\WishList\UI\API\Transformers\WishListItemTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class WishListItemController extends ApiController
{
    /**
     * @param CreateWishListItemRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createWishListItem(CreateWishListItemRequest $request): JsonResponse
    {
        $wishlistitem = app(CreateWishListItemAction::class)->run($request);

        return $this->created($this->transform($wishlistitem, WishListItemTransformer::class));
    }

    /**
     * @param FindWishListItemByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findWishListItemById(FindWishListItemByIdRequest $request): array
    {
        $wishlistitem = app(FindWishListItemByIdAction::class)->run($request);

        return $this->transform($wishlistitem, WishListItemTransformer::class);
    }

    /**
     * @param GetAllWishListItemsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllWishListItems(GetAllWishListItemsRequest $request): array
    {
        $wishlistitems = app(GetAllWishListItemsAction::class)->run($request);

        return $this->transform($wishlistitems, WishListItemTransformer::class);
    }

    /**
     * @param UpdateWishListItemRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateWishListItem(UpdateWishListItemRequest $request): array
    {
        $wishlistitem = app(UpdateWishListItemAction::class)->run($request);

        return $this->transform($wishlistitem, WishListItemTransformer::class);
    }

    /**
     * @param DeleteWishListItemRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteWishListItem(DeleteWishListItemRequest $request): JsonResponse
    {
        app(DeleteWishListItemAction::class)->run($request);

        return $this->noContent();
    }
}
