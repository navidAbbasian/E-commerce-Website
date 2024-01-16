<?php

namespace App\Containers\AppSection\Shop\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Shop\Data\Repositories\DomainRepository;
// use App\Containers\AppSection\Shop\Events\DomainsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDomainsTask extends ParentTask
{
    public function __construct(
        protected DomainRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        // DomainsListedEvent::dispatch($result);

        return $result;
    }
}
