<?php

namespace App\Containers\AppSection\Carousel\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Carousel\Data\Repositories\CarouselRepository;
use App\Containers\AppSection\Carousel\Events\CarouselsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCarouselsTask extends ParentTask
{
    public function __construct(
        protected CarouselRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        CarouselsListedEvent::dispatch($result);

        return $result;
    }
}
