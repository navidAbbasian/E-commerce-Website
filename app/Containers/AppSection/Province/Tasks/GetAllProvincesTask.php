<?php

namespace App\Containers\AppSection\Province\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Province\Data\Repositories\ProvinceRepository;
use App\Containers\AppSection\Province\Events\ProvincesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProvincesTask extends ParentTask
{
    public function __construct(
        protected ProvinceRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        ProvincesListedEvent::dispatch($result);

        return $result;
    }
}
