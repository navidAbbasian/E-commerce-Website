<?php

namespace App\Containers\AppSection\User\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Data\Repositories\UserAddressRepository;
use App\Containers\AppSection\User\Events\UserAddressesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUserAddressesTask extends ParentTask
{
    public function __construct(
        protected UserAddressRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        UserAddressesListedEvent::dispatch($result);

        return $result;
    }
}
