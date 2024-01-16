<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tasks\CreateUserAddressTask;
use App\Containers\AppSection\User\UI\API\Requests\CreateUserAddressRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateUserAddressAction extends ParentAction
{
    /**
     * @param CreateUserAddressRequest $request
     * @return UserAddress
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateUserAddressRequest $request): UserAddress
    {
        $data = $request->sanitizeInput([
            'user_id',
            'city_id',
            'address',
            'zipcode',
        ]);

        return app(CreateUserAddressTask::class)->run($data);
    }
}
