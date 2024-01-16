<?php

namespace App\Containers\AppSection\Customer\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Customer\Tasks\GetAllCustomerAddressesTask;
use App\Containers\AppSection\Customer\UI\API\Requests\GetAllCustomerAddressesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCustomerAddressesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCustomerAddressesRequest $request): mixed
    {
        return app(GetAllCustomerAddressesTask::class)->run();
    }
}
