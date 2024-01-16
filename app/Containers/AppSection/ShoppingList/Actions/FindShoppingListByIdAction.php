<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tasks\FindShoppingListByIdTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\FindShoppingListByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindShoppingListByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindShoppingListByIdRequest $request): ShoppingList
    {
        return app(FindShoppingListByIdTask::class)->run($request->id);
    }
}
