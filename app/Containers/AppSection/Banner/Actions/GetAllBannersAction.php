<?php

namespace App\Containers\AppSection\Banner\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Banner\Tasks\GetAllBannersTask;
use App\Containers\AppSection\Banner\UI\API\Requests\GetAllBannersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBannersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBannersRequest $request): mixed
    {
        return app(GetAllBannersTask::class)->run();
    }
}
