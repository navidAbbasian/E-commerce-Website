<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;
use App\Containers\AppSection\Customer\UI\API\Requests\FindCustomerByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCustomerByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCustomerByIdRequest $request): Customer
    {
        return app(FindCustomerByIdTask::class)->run($request->id);
    }
}
