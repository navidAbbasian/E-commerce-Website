<?php

namespace App\Containers\AppSection\Footer\Actions;

use App\Containers\AppSection\Footer\Tasks\DeleteFooterTask;
use App\Containers\AppSection\Footer\UI\API\Requests\DeleteFooterRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteFooterAction extends ParentAction
{
    /**
     * @param DeleteFooterRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFooterRequest $request): int
    {
        return app(DeleteFooterTask::class)->run($request->id);
    }
}
