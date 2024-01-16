<?php

namespace App\Containers\AppSection\Carousel\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Carousel\Tasks\GetAllCarouselsTask;
use App\Containers\AppSection\Carousel\UI\API\Requests\GetAllCarouselsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCarouselsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCarouselsRequest $request): mixed
    {
        return app(GetAllCarouselsTask::class)->run();
    }
}
