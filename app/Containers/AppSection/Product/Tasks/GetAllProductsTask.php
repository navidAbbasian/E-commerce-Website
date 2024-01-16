<?php

namespace App\Containers\AppSection\Product\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Events\ProductsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductsTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        ProductsListedEvent::dispatch($result);

        return $result;
    }
}
