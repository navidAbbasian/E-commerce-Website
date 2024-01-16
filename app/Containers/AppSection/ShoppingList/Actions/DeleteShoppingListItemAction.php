<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use App\Containers\AppSection\ShoppingList\Tasks\DeleteShoppingListItemTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\DeleteShoppingListItemRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteShoppingListItemAction extends ParentAction
{
    /**
     * @param DeleteShoppingListItemRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteShoppingListItemRequest $request): int
    {
        return app(DeleteShoppingListItemTask::class)->run($request->id);
    }
}
