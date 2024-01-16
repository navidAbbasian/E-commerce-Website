<?php

namespace App\Containers\AppSection\Customer\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Containers\AppSection\Customer\Tasks\UpdateCustomerAddressTask;
use App\Containers\AppSection\Customer\UI\API\Requests\UpdateCustomerAddressRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCustomerAddressAction extends ParentAction
{
    /**
     * @param UpdateCustomerAddressRequest $request
     * @return CustomerAddress
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCustomerAddressRequest $request): CustomerAddress
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'customer_id',
            'city_id',
            'fullname',
            'address',
            'zipcode',
            'floor',
            'unit',
            'number',
            'mobile',
            'phone',
        ]);

        return app(UpdateCustomerAddressTask::class)->run($data, $request->id);
    }
}
