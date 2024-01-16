<?php

namespace App\Containers\AppSection\Header\Actions;

use App\Containers\AppSection\Header\Tasks\DeleteHeaderTask;
use App\Containers\AppSection\Header\UI\API\Requests\DeleteHeaderRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteHeaderAction extends ParentAction
{
    /**
     * @param DeleteHeaderRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteHeaderRequest $request): int
    {
        return app(DeleteHeaderTask::class)->run($request->id);
    }
}
