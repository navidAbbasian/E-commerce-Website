<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Data\Repositories\CustomerRepository;
use App\Containers\AppSection\Customer\Events\CustomerFoundByIdEvent;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCustomerByIdTask extends ParentTask
{
    public function __construct(
        protected CustomerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Customer
    {
        try {
            $customer = $this->repository->find($id);
            CustomerFoundByIdEvent::dispatch($customer);

            return $customer;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
