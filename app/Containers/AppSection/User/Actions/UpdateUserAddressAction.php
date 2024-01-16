<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tasks\UpdateUserAddressTask;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserAddressRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateUserAddressAction extends ParentAction
{
    /**
     * @param UpdateUserAddressRequest $request
     * @return UserAddress
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateUserAddressRequest $request): UserAddress
    {
        $data = $request->sanitizeInput([
            'user_id',
            'city_id',
            'address',
            'zipcode',
        ]);

        return app(UpdateUserAddressTask::class)->run($data, $request->id);
    }
}
