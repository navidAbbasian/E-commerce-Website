<?php

namespace App\Containers\AppSection\Shop\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Shop\Data\Repositories\ShopRepository;
use App\Containers\AppSection\Shop\Events\ShopsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShopsTask extends ParentTask
{
    public function __construct(
        protected ShopRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        ShopsListedEvent::dispatch($result);

        return $result;
    }
}
