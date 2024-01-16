<?php

namespace App\Containers\AppSection\ShoppingList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ShoppingList\Models\ShoppingListItem;
use App\Containers\AppSection\ShoppingList\Tasks\UpdateShoppingListItemTask;
use App\Containers\AppSection\ShoppingList\UI\API\Requests\UpdateShoppingListItemRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateShoppingListItemAction extends ParentAction
{
    /**
     * @param UpdateShoppingListItemRequest $request
     * @return ShoppingListItem
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateShoppingListItemRequest $request): ShoppingListItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shopping_list_id',
            'product_id',
        ]);

        return app(UpdateShoppingListItemTask::class)->run($data, $request->id);
    }
}
