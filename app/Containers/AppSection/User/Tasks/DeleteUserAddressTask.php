<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserAddressRepository;
use App\Containers\AppSection\User\Events\UserAddressDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteUserAddressTask extends ParentTask
{
    public function __construct(
        protected UserAddressRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            UserAddressDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
