<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use App\Containers\AppSection\ShoppingList\Tasks\DeleteShoppingListTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\DeleteShoppingListRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteShoppingListAction extends ParentAction
{
    /**
     * @param DeleteShoppingListRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteShoppingListRequest $request): int
    {
        return app(DeleteShoppingListTask::class)->run($request->id);
    }
}
