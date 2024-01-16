<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tasks\UpdateShoppingListTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\UpdateShoppingListRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateShoppingListAction extends ParentAction
{
    /**
     * @param UpdateShoppingListRequest $request
     * @return ShoppingList
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateShoppingListRequest $request): ShoppingList
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'customer_id',
            'name',
        ]);

        return app(UpdateShoppingListTask::class)->run($data, $request->id);
    }
}
