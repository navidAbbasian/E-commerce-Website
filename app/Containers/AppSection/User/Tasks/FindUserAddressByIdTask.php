<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserAddressRepository;
use App\Containers\AppSection\User\Events\UserAddressFoundByIdEvent;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindUserAddressByIdTask extends ParentTask
{
    public function __construct(
        protected UserAddressRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): UserAddress
    {
        try {
            $useraddress = $this->repository->find($id);
            UserAddressFoundByIdEvent::dispatch($useraddress);

            return $useraddress;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
