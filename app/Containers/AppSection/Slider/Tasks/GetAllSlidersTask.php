<?php

namespace App\Containers\AppSection\Slider\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Slider\Data\Repositories\SliderRepository;
use App\Containers\AppSection\Slider\Events\SlidersListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSlidersTask extends ParentTask
{
    public function __construct(
        protected SliderRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        SlidersListedEvent::dispatch($result);

        return $result;
    }
}
