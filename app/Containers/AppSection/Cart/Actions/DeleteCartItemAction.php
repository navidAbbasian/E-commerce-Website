<?php

namespace App\Containers\AppSection\Cart\Actions;

use App\Containers\AppSection\Cart\Tasks\DeleteCartItemTask;
use App\Containers\AppSection\Cart\UI\API\Requests\DeleteCartItemRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCartItemAction extends ParentAction
{
    /**
     * @param DeleteCartItemRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCartItemRequest $request): int
    {
        return app(DeleteCartItemTask::class)->run($request->id);
    }
}
