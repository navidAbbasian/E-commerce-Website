<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tasks\FindUserAddressByIdTask;
use App\Containers\AppSection\User\UI\API\Requests\FindUserAddressByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindUserAddressByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindUserAddressByIdRequest $request): UserAddress
    {
        return app(FindUserAddressByIdTask::class)->run($request->id);
    }
}
