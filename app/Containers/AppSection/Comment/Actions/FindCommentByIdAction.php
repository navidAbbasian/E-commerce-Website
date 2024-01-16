<?php

namespace App\Containers\AppSection\Comment\Actions;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\FindCommentByIdTask;
use App\Containers\AppSection\Comment\UI\API\Requests\FindCommentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCommentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCommentByIdRequest $request): Comment
    {
        return app(FindCommentByIdTask::class)->run($request->id);
    }
}
