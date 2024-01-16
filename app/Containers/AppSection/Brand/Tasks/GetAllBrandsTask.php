<?php

namespace App\Containers\AppSection\Brand\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Brand\Data\Repositories\BrandRepository;
use App\Containers\AppSection\Brand\Events\BrandsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBrandsTask extends ParentTask
{
    public function __construct(
        protected BrandRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        BrandsListedEvent::dispatch($result);

        return $result;
    }
}
