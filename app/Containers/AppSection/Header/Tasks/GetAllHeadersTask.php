<?php

namespace App\Containers\AppSection\Header\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Header\Data\Repositories\HeaderRepository;
use App\Containers\AppSection\Header\Events\HeadersListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllHeadersTask extends ParentTask
{
    public function __construct(
        protected HeaderRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        HeadersListedEvent::dispatch($result);

        return $result;
    }
}
