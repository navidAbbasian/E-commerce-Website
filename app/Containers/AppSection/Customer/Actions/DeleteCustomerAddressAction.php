<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Tasks\DeleteCustomerAddressTask;
use App\Containers\AppSection\Customer\UI\API\Requests\DeleteCustomerAddressRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCustomerAddressAction extends ParentAction
{
    /**
     * @param DeleteCustomerAddressRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCustomerAddressRequest $request): int
    {
        return app(DeleteCustomerAddressTask::class)->run($request->id);
    }
}
