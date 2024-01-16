<?php

namespace App\Containers\AppSection\Footer\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Footer\Tasks\GetAllFootersTask;
use App\Containers\AppSection\Footer\UI\API\Requests\GetAllFootersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFootersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllFootersRequest $request): mixed
    {
        return app(GetAllFootersTask::class)->run();
    }
}
