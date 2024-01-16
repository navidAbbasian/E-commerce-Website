<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use App\Containers\AppSection\ShoppingList\Models\ShoppingListItem;
use App\Containers\AppSection\ShoppingList\Tasks\FindShoppingListItemByIdTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\FindShoppingListItemByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindShoppingListItemByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindShoppingListItemByIdRequest $request): ShoppingListItem
    {
        return app(FindShoppingListItemByIdTask::class)->run($request->id);
    }
}
