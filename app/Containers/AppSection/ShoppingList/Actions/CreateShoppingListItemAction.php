<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ShoppingList\Models\ShoppingListItem;
use App\Containers\AppSection\ShoppingList\Tasks\CreateShoppingListItemTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\CreateShoppingListItemRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateShoppingListItemAction extends ParentAction
{
    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateShoppingListItemRequest $request): ShoppingListItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shopping_list_id',
            'product_id',
        ]);

        return app(CreateShoppingListItemTask::class)->run($data);
    }
}
