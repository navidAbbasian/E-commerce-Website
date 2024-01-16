<?php

namespace App\Containers\AppSection\Media\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Media\Actions\CreateMediaAction;
use App\Containers\AppSection\Media\Actions\DeleteMediaAction;
use App\Containers\AppSection\Media\Actions\FindMediaByIdAction;
use App\Containers\AppSection\Media\Actions\GetAllMediaAction;
use App\Containers\AppSection\Media\Actions\UpdateMediaAction;
use App\Containers\AppSection\Media\UI\API\Requests\CreateMediaRequest;
use App\Containers\AppSection\Media\UI\API\Requests\DeleteMediaRequest;
use App\Containers\AppSection\Media\UI\API\Requests\FindMediaByIdRequest;
use App\Containers\AppSection\Media\UI\API\Requests\GetAllMediaRequest;
use App\Containers\AppSection\Media\UI\API\Requests\UpdateMediaRequest;
use App\Containers\AppSection\Media\UI\API\Transformers\MediaTransformer;
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
     * @param CreateMediaRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createMedia(CreateMediaRequest $request): JsonResponse
    {
        $media = app(CreateMediaAction::class)->run($request);

        return $this->created($this->transform($media, MediaTransformer::class));
    }

    /**
     * @param FindMediaByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findMediaById(FindMediaByIdRequest $request): array
    {
        $media = app(FindMediaByIdAction::class)->run($request);

        return $this->transform($media, MediaTransformer::class);
    }

    /**
     * @param GetAllMediaRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllMedia(GetAllMediaRequest $request): array
    {
        $media = app(GetAllMediaAction::class)->run($request);

        return $this->transform($media, MediaTransformer::class);
    }

    /**
     * @param UpdateMediaRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateMedia(UpdateMediaRequest $request): array
    {
        $media = app(UpdateMediaAction::class)->run($request);

        return $this->transform($media, MediaTransformer::class);
    }

    /**
     * @param DeleteMediaRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteMedia(DeleteMediaRequest $request): JsonResponse
    {
        app(DeleteMediaAction::class)->run($request);

        return $this->noContent();
    }
}
