<?php

namespace App\Containers\AppSection\Media\Actions;

use App\Containers\AppSection\Media\Tasks\DeleteMediaTask;
use App\Containers\AppSection\Media\UI\API\Requests\DeleteMediaRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteMediaAction extends ParentAction
{
    /**
     * @param DeleteMediaRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteMediaRequest $request): int
    {
        return app(DeleteMediaTask::class)->run($request->id);
    }
}
