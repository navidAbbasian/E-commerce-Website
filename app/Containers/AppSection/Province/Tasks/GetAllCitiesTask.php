<?php

namespace App\Containers\AppSection\Province\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Province\Data\Repositories\CityRepository;
use App\Containers\AppSection\Province\Events\CitiesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCitiesTask extends ParentTask
{
    public function __construct(
        protected CityRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        CitiesListedEvent::dispatch($result);

        return $result;
    }
}
