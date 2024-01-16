<?php

namespace App\Containers\AppSection\Banner\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Banner\Data\Repositories\BannerRepository;
use App\Containers\AppSection\Banner\Events\BannersListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBannersTask extends ParentTask
{
    public function __construct(
        protected BannerRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        BannersListedEvent::dispatch($result);

        return $result;
    }
}
