<?php

namespace App\Containers\AppSection\Customer\Tasks;


use App\Containers\AppSection\Customer\Data\Repositories\CustomerAddressRepository;
use App\Containers\AppSection\Customer\Events\CustomerAddressDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteCustomerAddressTask extends ParentTask
{
    public function __construct(
        protected CustomerAddressRepository $repository
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
            CustomerAddressDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
