<?php

namespace App\Containers\AppSection\Customer\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Customer\Data\Repositories\CustomerAddressRepository;
use App\Containers\AppSection\Customer\Events\CustomerAddressesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCustomerAddressesTask extends ParentTask
{
    public function __construct(
        protected CustomerAddressRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        CustomerAddressesListedEvent::dispatch($result);

        return $result;
    }
}
