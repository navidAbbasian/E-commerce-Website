<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ShoppingList\Actions\CreateShoppingListAction;
use App\Containers\AppSection\ShoppingList\Actions\DeleteShoppingListAction;
use App\Containers\AppSection\ShoppingList\Actions\FindShoppingListByIdAction;
use App\Containers\AppSection\ShoppingList\Actions\GetAllShoppingListsAction;
use App\Containers\AppSection\ShoppingList\Actions\UpdateShoppingListAction;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\CreateShoppingListRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\DeleteShoppingListRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\FindShoppingListByIdRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\GetAllShoppingListsRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\UpdateShoppingListRequest;
use App\Containers\AppSection\ShoppingList\UI\API\Transformers\ShoppingListTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class ShoppingListController extends ApiController
{
    /**
     * @param CreateShoppingListRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createShoppingList(CreateShoppingListRequest $request): JsonResponse
    {
        $shoppinglist = app(CreateShoppingListAction::class)->run($request);

        return $this->created($this->transform($shoppinglist, ShoppingListTransformer::class));
    }

    /**
     * @param FindShoppingListByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findShoppingListById(FindShoppingListByIdRequest $request): array
    {
        $shoppinglist = app(FindShoppingListByIdAction::class)->run($request);

        return $this->transform($shoppinglist, ShoppingListTransformer::class);
    }

    /**
     * @param GetAllShoppingListsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllShoppingLists(GetAllShoppingListsRequest $request): array
    {
        $shoppinglists = app(GetAllShoppingListsAction::class)->run($request);

        return $this->transform($shoppinglists, ShoppingListTransformer::class);
    }

    /**
     * @param UpdateShoppingListRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateShoppingList(UpdateShoppingListRequest $request): array
    {
        $shoppinglist = app(UpdateShoppingListAction::class)->run($request);

        return $this->transform($shoppinglist, ShoppingListTransformer::class);
    }

    /**
     * @param DeleteShoppingListRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteShoppingList(DeleteShoppingListRequest $request): JsonResponse
    {
        app(DeleteShoppingListAction::class)->run($request);

        return $this->noContent();
    }
}
