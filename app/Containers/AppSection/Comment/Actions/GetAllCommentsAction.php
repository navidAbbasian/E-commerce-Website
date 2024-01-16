<?php

namespace App\Containers\AppSection\Comment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Comment\Tasks\GetAllCommentsTask;
use App\Containers\AppSection\Comment\UI\API\Requests\GetAllCommentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCommentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCommentsRequest $request): mixed
    {
        return app(GetAllCommentsTask::class)->run();
    }
}
