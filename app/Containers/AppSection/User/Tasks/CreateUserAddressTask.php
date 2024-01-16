<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserAddressRepository;
use App\Containers\AppSection\User\Events\UserAddressCreatedEvent;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateUserAddressTask extends ParentTask
{
    public function __construct(
        protected UserAddressRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): UserAddress
    {
        try {
            $useraddress = $this->repository->create($data);
            UserAddressCreatedEvent::dispatch($useraddress);

            return $useraddress;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
