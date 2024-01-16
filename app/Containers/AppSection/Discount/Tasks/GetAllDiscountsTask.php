<?php

namespace App\Containers\AppSection\Discount\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Discount\Data\Repositories\DiscountRepository;
use App\Containers\AppSection\Discount\Events\DiscountsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDiscountsTask extends ParentTask
{
    public function __construct(
        protected DiscountRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        DiscountsListedEvent::dispatch($result);

        return $result;
    }
}
