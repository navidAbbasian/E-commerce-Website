<?php

namespace App\Containers\AppSection\Order\Actions;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\FindOrderByIdTask;
use App\Containers\AppSection\Order\UI\API\Requests\FindOrderByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindOrderByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindOrderByIdRequest $request): Order
    {
        return app(FindOrderByIdTask::class)->run($request->id);
    }
}
