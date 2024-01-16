<?php

namespace App\Containers\AppSection\Cart\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Cart\Models\CartItem;
use App\Containers\AppSection\Cart\Tasks\UpdateCartItemTask;
use App\Containers\AppSection\Cart\UI\API\Requests\UpdateCartItemRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCartItemAction extends ParentAction
{
    /**
     * @param UpdateCartItemRequest $request
     * @return CartItem
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCartItemRequest $request): CartItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'cart_id',
            'product_id',
        ]);

        return app(UpdateCartItemTask::class)->run($data, $request->id);
    }
}
