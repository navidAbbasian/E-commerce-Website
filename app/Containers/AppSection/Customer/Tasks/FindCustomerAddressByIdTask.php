<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Data\Repositories\CustomerAddressRepository;
use App\Containers\AppSection\Customer\Events\CustomerAddressFoundByIdEvent;
use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCustomerAddressByIdTask extends ParentTask
{
    public function __construct(
        protected CustomerAddressRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): CustomerAddress
    {
        try {
            $customeraddress = $this->repository->find($id);
            CustomerAddressFoundByIdEvent::dispatch($customeraddress);

            return $customeraddress;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
