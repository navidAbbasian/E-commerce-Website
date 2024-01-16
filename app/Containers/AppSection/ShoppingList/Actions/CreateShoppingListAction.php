<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tasks\CreateShoppingListTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\CreateShoppingListRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateShoppingListAction extends ParentAction
{
    /**
     * @param CreateShoppingListRequest $request
     * @return ShoppingList
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateShoppingListRequest $request): ShoppingList
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shop_id',
            'customer_id',
            'name',
        ]);

        return app(CreateShoppingListTask::class)->run($data);
    }
}
