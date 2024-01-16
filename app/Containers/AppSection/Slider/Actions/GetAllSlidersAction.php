<?php

namespace App\Containers\AppSection\Slider\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Slider\Tasks\GetAllSlidersTask;
use App\Containers\AppSection\Slider\UI\API\Requests\GetAllSlidersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSlidersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllSlidersRequest $request): mixed
    {
        return app(GetAllSlidersTask::class)->run();
    }
}
