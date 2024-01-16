<?php

namespace App\Containers\AppSection\Cart\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Cart\Tasks\GetAllCartsTask;
use App\Containers\AppSection\Cart\UI\API\Requests\GetAllCartsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCartsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCartsRequest $request): mixed
    {
        return app(GetAllCartsTask::class)->run();
    }
}
