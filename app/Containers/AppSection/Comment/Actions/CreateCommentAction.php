<?php

namespace App\Containers\AppSection\Comment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\CreateCommentTask;
use App\Containers\AppSection\Comment\UI\API\Requests\CreateCommentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCommentAction extends ParentAction
{
    /**
     * @param CreateCommentRequest $request
     * @return Comment
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCommentRequest $request): Comment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateCommentTask::class)->run($data);
    }
}
