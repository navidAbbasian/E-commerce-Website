<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Data\Repositories\CustomerRepository;
use App\Containers\AppSection\Customer\Events\CustomerCreatedEvent;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCustomerTask extends ParentTask
{
    public function __construct(
        protected CustomerRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Customer
    {
        try {
            $customer = $this->repository->create($data);
            CustomerCreatedEvent::dispatch($customer);

            return $customer;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
