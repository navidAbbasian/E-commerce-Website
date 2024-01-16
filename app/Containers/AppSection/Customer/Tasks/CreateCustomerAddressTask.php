<?php

namespace App\Containers\AppSection\Customer\Tasks;


use App\Containers\AppSection\Customer\Data\Repositories\CustomerAddressRepository;
use App\Containers\AppSection\Customer\Events\CustomerAddressCreatedEvent;
use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCustomerAddressTask extends ParentTask
{
    public function __construct(
        protected CustomerAddressRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): CustomerAddress
    {
        try {
            $customeraddress = $this->repository->create($data);
            CustomerAddressCreatedEvent::dispatch($customeraddress);

            return $customeraddress;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
