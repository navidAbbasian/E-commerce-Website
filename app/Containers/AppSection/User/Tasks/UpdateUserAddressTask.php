<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserAddressRepository;
use App\Containers\AppSection\User\Events\UserAddressUpdatedEvent;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateUserAddressTask extends ParentTask
{
    public function __construct(
        protected UserAddressRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): UserAddress
    {
        try {
            $useraddress = $this->repository->update($data, $id);
            UserAddressUpdatedEvent::dispatch($useraddress);

            return $useraddress;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
