<?php

namespace App\Containers\AppSection\Cart\Actions;

use App\Containers\AppSection\Cart\Models\CartItem;
use App\Containers\AppSection\Cart\Tasks\FindCartItemByIdTask;
use App\Containers\AppSection\Cart\UI\API\Requests\FindCartItemByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCartItemByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCartItemByIdRequest $request): CartItem
    {
        return app(FindCartItemByIdTask::class)->run($request->id);
    }
}
