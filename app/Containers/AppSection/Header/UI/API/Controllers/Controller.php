<?php

namespace App\Containers\AppSection\Header\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Header\Actions\CreateHeaderAction;
use App\Containers\AppSection\Header\Actions\DeleteHeaderAction;
use App\Containers\AppSection\Header\Actions\FindHeaderByIdAction;
use App\Containers\AppSection\Header\Actions\GetAllHeadersAction;
use App\Containers\AppSection\Header\Actions\UpdateHeaderAction;
use App\Containers\AppSection\Header\UI\API\Requests\CreateHeaderRequest;
use App\Containers\AppSection\Header\UI\API\Requests\DeleteHeaderRequest;
use App\Containers\AppSection\Header\UI\API\Requests\FindHeaderByIdRequest;
use App\Containers\AppSection\Header\UI\API\Requests\GetAllHeadersRequest;
use App\Containers\AppSection\Header\UI\API\Requests\UpdateHeaderRequest;
use App\Containers\AppSection\Header\UI\API\Transformers\HeaderTransformer;
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
     * @param CreateHeaderRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createHeader(CreateHeaderRequest $request): JsonResponse
    {
        $header = app(CreateHeaderAction::class)->run($request);

        return $this->created($this->transform($header, HeaderTransformer::class));
    }

    /**
     * @param FindHeaderByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findHeaderById(FindHeaderByIdRequest $request): array
    {
        $header = app(FindHeaderByIdAction::class)->run($request);

        return $this->transform($header, HeaderTransformer::class);
    }

    /**
     * @param GetAllHeadersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllHeaders(GetAllHeadersRequest $request): array
    {
        $headers = app(GetAllHeadersAction::class)->run($request);

        return $this->transform($headers, HeaderTransformer::class);
    }

    /**
     * @param UpdateHeaderRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateHeader(UpdateHeaderRequest $request): array
    {
        $header = app(UpdateHeaderAction::class)->run($request);

        return $this->transform($header, HeaderTransformer::class);
    }

    /**
     * @param DeleteHeaderRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteHeader(DeleteHeaderRequest $request): JsonResponse
    {
        app(DeleteHeaderAction::class)->run($request);

        return $this->noContent();
    }
}
