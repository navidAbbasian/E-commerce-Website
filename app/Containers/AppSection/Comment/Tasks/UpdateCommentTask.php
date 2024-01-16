<?php

namespace App\Containers\AppSection\Comment\Tasks;

use App\Containers\AppSection\Comment\Data\Repositories\CommentRepository;
use App\Containers\AppSection\Comment\Events\CommentUpdatedEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCommentTask extends ParentTask
{
    public function __construct(
        protected CommentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Comment
    {
        try {
            $comment = $this->repository->update($data, $id);
            CommentUpdatedEvent::dispatch($comment);

            return $comment;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
