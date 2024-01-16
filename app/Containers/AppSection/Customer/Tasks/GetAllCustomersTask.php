<?php

namespace App\Containers\AppSection\Customer\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Customer\Data\Repositories\CustomerRepository;
use App\Containers\AppSection\Customer\Events\CustomersListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCustomersTask extends ParentTask
{
    public function __construct(
        protected CustomerRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        CustomersListedEvent::dispatch($result);

        return $result;
    }
}
