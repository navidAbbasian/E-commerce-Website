<?php

namespace App\Containers\AppSection\Footer\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Footer\Data\Repositories\FooterRepository;
use App\Containers\AppSection\Footer\Events\FootersListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFootersTask extends ParentTask
{
    public function __construct(
        protected FooterRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        FootersListedEvent::dispatch($result);

        return $result;
    }
}
