<?php

namespace App\Containers\AppSection\Province\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Province\Tasks\GetAllCitiesTask;
use App\Containers\AppSection\Province\UI\API\Requests\GetAllCitiesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCitiesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCitiesRequest $request): mixed
    {
        return app(GetAllCitiesTask::class)->run();
    }
}
