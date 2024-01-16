<?php

namespace App\Containers\AppSection\Tag\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Tag\Actions\CreateTagAction;
use App\Containers\AppSection\Tag\Actions\DeleteTagAction;
use App\Containers\AppSection\Tag\Actions\FindTagByIdAction;
use App\Containers\AppSection\Tag\Actions\GetAllTagsAction;
use App\Containers\AppSection\Tag\Actions\UpdateTagAction;
use App\Containers\AppSection\Tag\UI\API\Requests\CreateTagRequest;
use App\Containers\AppSection\Tag\UI\API\Requests\DeleteTagRequest;
use App\Containers\AppSection\Tag\UI\API\Requests\FindTagByIdRequest;
use App\Containers\AppSection\Tag\UI\API\Requests\GetAllTagsRequest;
use App\Containers\AppSection\Tag\UI\API\Requests\UpdateTagRequest;
use App\Containers\AppSection\Tag\UI\API\Transformers\TagTransformer;
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
     * @param CreateTagRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createTag(CreateTagRequest $request): JsonResponse
    {
        $tag = app(CreateTagAction::class)->run($request);

        return $this->created($this->transform($tag, TagTransformer::class));
    }

    /**
     * @param FindTagByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findTagById(FindTagByIdRequest $request): array
    {
        $tag = app(FindTagByIdAction::class)->run($request);

        return $this->transform($tag, TagTransformer::class);
    }

    /**
     * @param GetAllTagsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllTags(GetAllTagsRequest $request): array
    {
        $tags = app(GetAllTagsAction::class)->run($request);

        return $this->transform($tags, TagTransformer::class);
    }

    /**
     * @param UpdateTagRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateTag(UpdateTagRequest $request): array
    {
        $tag = app(UpdateTagAction::class)->run($request);

        return $this->transform($tag, TagTransformer::class);
    }

    /**
     * @param DeleteTagRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteTag(DeleteTagRequest $request): JsonResponse
    {
        app(DeleteTagAction::class)->run($request);

        return $this->noContent();
    }
}
