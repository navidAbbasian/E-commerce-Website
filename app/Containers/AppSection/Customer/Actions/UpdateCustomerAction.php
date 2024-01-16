<?php

namespace App\Containers\AppSection\Customer\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\UpdateCustomerTask;
use App\Containers\AppSection\Customer\UI\API\Requests\UpdateCustomerRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCustomerAction extends ParentAction
{
    /**
     * @param UpdateCustomerRequest $request
     * @return Customer
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCustomerRequest $request): Customer
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'firstname',
            'lastname',
            'mobile',
            'phone',
            'email',
            'national_code',
            'email_verified_at',
            'password',
            'gender',
            'birth',
            'newsletter',
            'score',
            'refund_card',
            'referral_link',
            'status',
        ]);

        return app(UpdateCustomerTask::class)->run($data, $request->id);
    }
}
