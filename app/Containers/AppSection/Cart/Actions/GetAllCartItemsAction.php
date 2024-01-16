<?php

namespace App\Containers\AppSection\Cart\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Cart\Tasks\GetAllCartItemsTask;
use App\Containers\AppSection\Cart\UI\API\Requests\GetAllCartItemsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCartItemsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCartItemsRequest $request): mixed
    {
        return app(GetAllCartItemsTask::class)->run();
    }
}
