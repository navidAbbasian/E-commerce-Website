<?php

namespace App\Containers\AppSection\Category\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Category\Tasks\GetAllCategoriesTask;
use App\Containers\AppSection\Category\UI\API\Requests\GetAllCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCategoriesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCategoriesRequest $request): mixed
    {
        return app(GetAllCategoriesTask::class)->run();
    }
}
