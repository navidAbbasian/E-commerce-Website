<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Tasks\DeleteUserAddressTask;
use App\Containers\AppSection\User\UI\API\Requests\DeleteUserAddressRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteUserAddressAction extends ParentAction
{
    /**
     * @param DeleteUserAddressRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteUserAddressRequest $request): int
    {
        return app(DeleteUserAddressTask::class)->run($request->id);
    }
}
