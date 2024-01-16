<?php

namespace App\Containers\AppSection\Footer\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Footer\Actions\CreateFooterAction;
use App\Containers\AppSection\Footer\Actions\DeleteFooterAction;
use App\Containers\AppSection\Footer\Actions\FindFooterByIdAction;
use App\Containers\AppSection\Footer\Actions\GetAllFootersAction;
use App\Containers\AppSection\Footer\Actions\UpdateFooterAction;
use App\Containers\AppSection\Footer\UI\API\Requests\CreateFooterRequest;
use App\Containers\AppSection\Footer\UI\API\Requests\DeleteFooterRequest;
use App\Containers\AppSection\Footer\UI\API\Requests\FindFooterByIdRequest;
use App\Containers\AppSection\Footer\UI\API\Requests\GetAllFootersRequest;
use App\Containers\AppSection\Footer\UI\API\Requests\UpdateFooterRequest;
use App\Containers\AppSection\Footer\UI\API\Transformers\FooterTransformer;
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
     * @param CreateFooterRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createFooter(CreateFooterRequest $request): JsonResponse
    {
        $footer = app(CreateFooterAction::class)->run($request);

        return $this->created($this->transform($footer, FooterTransformer::class));
    }

    /**
     * @param FindFooterByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findFooterById(FindFooterByIdRequest $request): array
    {
        $footer = app(FindFooterByIdAction::class)->run($request);

        return $this->transform($footer, FooterTransformer::class);
    }

    /**
     * @param GetAllFootersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllFooters(GetAllFootersRequest $request): array
    {
        $footers = app(GetAllFootersAction::class)->run($request);

        return $this->transform($footers, FooterTransformer::class);
    }

    /**
     * @param UpdateFooterRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateFooter(UpdateFooterRequest $request): array
    {
        $footer = app(UpdateFooterAction::class)->run($request);

        return $this->transform($footer, FooterTransformer::class);
    }

    /**
     * @param DeleteFooterRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteFooter(DeleteFooterRequest $request): JsonResponse
    {
        app(DeleteFooterAction::class)->run($request);

        return $this->noContent();
    }
}
