<?php

namespace App\Containers\AppSection\Comment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Comment\Actions\CreateCommentAction;
use App\Containers\AppSection\Comment\Actions\DeleteCommentAction;
use App\Containers\AppSection\Comment\Actions\FindCommentByIdAction;
use App\Containers\AppSection\Comment\Actions\GetAllCommentsAction;
use App\Containers\AppSection\Comment\Actions\UpdateCommentAction;
use App\Containers\AppSection\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\DeleteCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\FindCommentByIdRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\GetAllCommentsRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\UpdateCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Transformers\CommentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @param CreateCommentRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createComment(CreateCommentRequest $request): JsonResponse
    {
        $comment = app(CreateCommentAction::class)->run($request);

        return $this->created($this->transform($comment, CommentTransformer::class));
    }

    /**
     * @param FindCommentByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCommentById(FindCommentByIdRequest $request): array
    {
        $comment = app(FindCommentByIdAction::class)->run($request);

        return $this->transform($comment, CommentTransformer::class);
    }

    /**
     * @param GetAllCommentsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllComments(GetAllCommentsRequest $request): array
    {
        $comments = app(GetAllCommentsAction::class)->run($request);

        return $this->transform($comments, CommentTransformer::class);
    }

    /**
     * @param UpdateCommentRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateComment(UpdateCommentRequest $request): array
    {
        $comment = app(UpdateCommentAction::class)->run($request);

        return $this->transform($comment, CommentTransformer::class);
    }

    /**
     * @param DeleteCommentRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteComment(DeleteCommentRequest $request): JsonResponse
    {
        app(DeleteCommentAction::class)->run($request);

        return $this->noContent();
    }
}
