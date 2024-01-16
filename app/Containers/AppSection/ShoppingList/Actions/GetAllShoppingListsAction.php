<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ShoppingList\Tasks\GetAllShoppingListsTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\GetAllShoppingListsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShoppingListsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllShoppingListsRequest $request): mixed
    {
        return app(GetAllShoppingListsTask::class)->run();
    }
}
