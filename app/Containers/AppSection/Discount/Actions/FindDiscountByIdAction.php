<?php

namespace App\Containers\AppSection\Discount\Actions;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tasks\FindDiscountByIdTask;
use App\Containers\AppSection\Discount\UI\API\Requests\FindDiscountByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindDiscountByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindDiscountByIdRequest $request): Discount
    {
        return app(FindDiscountByIdTask::class)->run($request->id);
    }
}
