<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Data\Repositories\CustomerAddressRepository;
use App\Containers\AppSection\Customer\Events\CustomerAddressUpdatedEvent;
use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCustomerAddressTask extends ParentTask
{
    public function __construct(
        protected CustomerAddressRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): CustomerAddress
    {
        try {
            $customeraddress = $this->repository->update($data, $id);
            CustomerAddressUpdatedEvent::dispatch($customeraddress);

            return $customeraddress;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
