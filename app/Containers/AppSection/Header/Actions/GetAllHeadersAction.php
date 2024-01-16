<?php

namespace App\Containers\AppSection\Header\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Header\Tasks\GetAllHeadersTask;
use App\Containers\AppSection\Header\UI\API\Requests\GetAllHeadersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllHeadersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllHeadersRequest $request): mixed
    {
        return app(GetAllHeadersTask::class)->run();
    }
}
