<?php

namespace App\Containers\AppSection\Shop\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Shop\Tasks\GetAllShopsTask;
use App\Containers\AppSection\Shop\UI\API\Requests\GetAllShopsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllShopsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllShopsRequest $request): mixed
    {
        return app(GetAllShopsTask::class)->run();
    }
}
