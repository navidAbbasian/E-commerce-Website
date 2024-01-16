<?php

namespace App\Containers\AppSection\Tax\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Tax\Data\Repositories\TaxRepository;
use App\Containers\AppSection\Tax\Events\TaxesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTaxesTask extends ParentTask
{
    public function __construct(
        protected TaxRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        TaxesListedEvent::dispatch($result);

        return $result;
    }
}
