<?php

namespace App\Containers\AppSection\Discount\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Discount\Tasks\GetAllDiscountsTask;
use App\Containers\AppSection\Discount\UI\API\Requests\GetAllDiscountsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDiscountsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllDiscountsRequest $request): mixed
    {
        return app(GetAllDiscountsTask::class)->run();
    }
}
