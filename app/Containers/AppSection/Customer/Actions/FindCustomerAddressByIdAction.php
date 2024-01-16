<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Containers\AppSection\Customer\Tasks\FindCustomerAddressByIdTask;
use App\Containers\AppSection\Customer\UI\API\Requests\FindCustomerAddressByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCustomerAddressByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCustomerAddressByIdRequest $request): CustomerAddress
    {
        return app(FindCustomerAddressByIdTask::class)->run($request->id);
    }
}
