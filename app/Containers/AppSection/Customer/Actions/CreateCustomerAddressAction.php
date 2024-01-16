<?php

namespace App\Containers\AppSection\Customer\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Containers\AppSection\Customer\Tasks\CreateCustomerAddressTask;
use App\Containers\AppSection\Customer\UI\API\Requests\CreateCustomerAddressRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCustomerAddressAction extends ParentAction
{
    /**
     * @param CreateCustomerAddressRequest $request
     * @return CustomerAddress
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCustomerAddressRequest $request): CustomerAddress
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

        return app(CreateCustomerAddressTask::class)->run($data);
    }
}
