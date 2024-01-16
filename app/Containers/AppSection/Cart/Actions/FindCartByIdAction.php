<?php

namespace App\Containers\AppSection\Cart\Actions;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\Tasks\FindCartByIdTask;
use App\Containers\AppSection\Cart\UI\API\Requests\FindCartByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCartByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCartByIdRequest $request): Cart
    {
        return app(FindCartByIdTask::class)->run($request->id);
    }
}
