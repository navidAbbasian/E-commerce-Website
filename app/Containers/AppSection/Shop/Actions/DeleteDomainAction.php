<?php

namespace App\Containers\AppSection\Shop\Actions;

use App\Containers\AppSection\Shop\Tasks\DeleteDomainTask;
use App\Containers\AppSection\Shop\UI\API\Requests\DeleteDomainRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteDomainAction extends ParentAction
{
    /**
     * @param DeleteDomainRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteDomainRequest $request): int
    {
        return app(DeleteDomainTask::class)->run($request->id);
    }
}
