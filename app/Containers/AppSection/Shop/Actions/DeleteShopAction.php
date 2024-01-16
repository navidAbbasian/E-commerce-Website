<?php

namespace App\Containers\AppSection\Shop\Actions;

use App\Containers\AppSection\Shop\Tasks\DeleteShopTask;
use App\Containers\AppSection\Shop\UI\API\Requests\DeleteShopRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteShopAction extends ParentAction
{
    /**
     * @param DeleteShopRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteShopRequest $request): int
    {
        return app(DeleteShopTask::class)->run($request->id);
    }
}
