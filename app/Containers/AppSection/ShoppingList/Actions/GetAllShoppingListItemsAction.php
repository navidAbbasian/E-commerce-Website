<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ShoppingList\Tasks\GetAllShoppingListItemsTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\GetAllShoppingListItemsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShoppingListItemsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllShoppingListItemsRequest $request): mixed
    {
        return app(GetAllShoppingListItemsTask::class)->run();
    }
}
