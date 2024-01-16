<?php

namespace App\Containers\AppSection\Comment\Actions;

use App\Containers\AppSection\Comment\Tasks\DeleteCommentTask;
use App\Containers\AppSection\Comment\UI\API\Requests\DeleteCommentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCommentAction extends ParentAction
{
    /**
     * @param DeleteCommentRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCommentRequest $request): int
    {
        return app(DeleteCommentTask::class)->run($request->id);
    }
}
