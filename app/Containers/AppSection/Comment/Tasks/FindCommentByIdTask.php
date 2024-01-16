<?php

namespace App\Containers\AppSection\Comment\Tasks;

use App\Containers\AppSection\Comment\Data\Repositories\CommentRepository;
use App\Containers\AppSection\Comment\Events\CommentFoundByIdEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCommentByIdTask extends ParentTask
{
    public function __construct(
        protected CommentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Comment
    {
        try {
            $comment = $this->repository->find($id);
            CommentFoundByIdEvent::dispatch($comment);

            return $comment;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
