<?php

namespace App\Containers\AppSection\Discount\Actions;

use App\Containers\AppSection\Discount\Tasks\DeleteDiscountTask;
use App\Containers\AppSection\Discount\UI\API\Requests\DeleteDiscountRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteDiscountAction extends ParentAction
{
    /**
     * @param DeleteDiscountRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteDiscountRequest $request): int
    {
        return app(DeleteDiscountTask::class)->run($request->id);
    }
}
