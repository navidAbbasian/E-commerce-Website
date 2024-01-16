<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ShoppingList\Actions\CreateShoppingListItemAction;
use App\Containers\AppSection\ShoppingList\Actions\DeleteShoppingListItemAction;
use App\Containers\AppSection\ShoppingList\Actions\FindShoppingListItemByIdAction;
use App\Containers\AppSection\ShoppingList\Actions\GetAllShoppingListItemsAction;
use App\Containers\AppSection\ShoppingList\Actions\UpdateShoppingListItemAction;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\CreateShoppingListItemRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\DeleteShoppingListItemRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\FindShoppingListItemByIdRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\GetAllShoppingListItemsRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\UpdateShoppingListItemRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Transformers\ShoppingListItemTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class ShoppingListItemController extends ApiController
{
    /**
     * @param CreateShoppingListItemRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createShoppingListItem(CreateShoppingListItemRequest $request): JsonResponse
    {
        $shoppinglistitem = app(CreateShoppingListItemAction::class)->run($request);

        return $this->created($this->transform($shoppinglistitem, ShoppingListItemTransformer::class));
    }

    /**
     * @param FindShoppingListItemByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findShoppingListItemById(FindShoppingListItemByIdRequest $request): array
    {
        $shoppinglistitem = app(FindShoppingListItemByIdAction::class)->run($request);

        return $this->transform($shoppinglistitem, ShoppingListItemTransformer::class);
    }

    /**
     * @param GetAllShoppingListItemsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllShoppingListItems(GetAllShoppingListItemsRequest $request): array
    {
        $shoppinglistitems = app(GetAllShoppingListItemsAction::class)->run($request);

        return $this->transform($shoppinglistitems, ShoppingListItemTransformer::class);
    }

    /**
     * @param UpdateShoppingListItemRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateShoppingListItem(UpdateShoppingListItemRequest $request): array
    {
        $shoppinglistitem = app(UpdateShoppingListItemAction::class)->run($request);

        return $this->transform($shoppinglistitem, ShoppingListItemTransformer::class);
    }

    /**
     * @param DeleteShoppingListItemRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteShoppingListItem(DeleteShoppingListItemRequest $request): JsonResponse
    {
        app(DeleteShoppingListItemAction::class)->run($request);

        return $this->noContent();
    }
}
