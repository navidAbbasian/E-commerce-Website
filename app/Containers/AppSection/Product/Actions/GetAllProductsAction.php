<?php

namespace App\Containers\AppSection\Product\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Product\Tasks\GetAllProductsTask;
use App\Containers\AppSection\Product\UI\API\Requests\GetAllProductsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllProductsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllProductsRequest $request): mixed
    {
        return app(GetAllProductsTask::class)->run();
    }
}
