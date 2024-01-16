<?php

namespace App\Containers\AppSection\Cart\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Cart\Models\CartItem;
use App\Containers\AppSection\Cart\Tasks\CreateCartItemTask;
use App\Containers\AppSection\Cart\UI\API\Requests\CreateCartItemRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCartItemAction extends ParentAction
{
    /**
     * @param CreateCartItemRequest $request
     * @return CartItem
     * @throws IncorrectIdException
     */
    public function run(CreateCartItemRequest $request): CartItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'cart_id',
            'product_id',
        ]);

        return app(CreateCartItemTask::class)->run($data);
    }
}
