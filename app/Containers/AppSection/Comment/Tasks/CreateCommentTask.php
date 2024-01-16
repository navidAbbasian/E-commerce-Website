<?php

namespace App\Containers\AppSection\Comment\Tasks;

use App\Containers\AppSection\Comment\Data\Repositories\CommentRepository;
use App\Containers\AppSection\Comment\Events\CommentCreatedEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCommentTask extends ParentTask
{
    public function __construct(
        protected CommentRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Comment
    {
        try {
            $comment = $this->repository->create($data);
            CommentCreatedEvent::dispatch($comment);

            return $comment;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
