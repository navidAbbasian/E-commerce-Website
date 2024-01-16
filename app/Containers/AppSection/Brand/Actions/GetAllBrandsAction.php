<?php

namespace App\Containers\AppSection\Brand\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Brand\Tasks\GetAllBrandsTask;
use App\Containers\AppSection\Brand\UI\API\Requests\GetAllBrandsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBrandsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllBrandsRequest $request): mixed
    {
        return app(GetAllBrandsTask::class)->run();
    }
}
