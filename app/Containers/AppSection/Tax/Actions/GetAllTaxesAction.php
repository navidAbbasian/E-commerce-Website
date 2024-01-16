<?php

namespace App\Containers\AppSection\Tax\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Tax\Tasks\GetAllTaxesTask;
use App\Containers\AppSection\Tax\UI\API\Requests\GetAllTaxesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTaxesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllTaxesRequest $request): mixed
    {
        return app(GetAllTaxesTask::class)->run();
    }
}
