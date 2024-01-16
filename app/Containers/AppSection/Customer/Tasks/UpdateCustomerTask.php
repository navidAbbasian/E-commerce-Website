<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Data\Repositories\CustomerRepository;
use App\Containers\AppSection\Customer\Events\CustomerUpdatedEvent;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCustomerTask extends ParentTask
{
    public function __construct(
        protected CustomerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Customer
    {
        try {
            $customer = $this->repository->update($data, $id);
            CustomerUpdatedEvent::dispatch($customer);

            return $customer;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
