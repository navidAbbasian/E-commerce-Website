<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Tasks\GetAllUserAddressesTask;
use App\Containers\AppSection\User\UI\API\Requests\GetAllUserAddressesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUserAddressesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllUserAddressesRequest $request): mixed
    {
        return app(GetAllUserAddressesTask::class)->run();
    }
}
