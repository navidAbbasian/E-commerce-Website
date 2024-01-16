<?php

namespace App\Containers\AppSection\Shop\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Shop\Tasks\GetAllDomainsTask;
use App\Containers\AppSection\Shop\UI\API\Requests\GetAllDomainsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDomainsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllDomainsRequest $request): mixed
    {
        return app(GetAllDomainsTask::class)->run();
    }
}
