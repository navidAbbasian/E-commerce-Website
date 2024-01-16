<?php

namespace App\Containers\AppSection\Shop\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Shop\Actions\CreateDomainAction;
use App\Containers\AppSection\Shop\Actions\DeleteDomainAction;
use App\Containers\AppSection\Shop\Actions\FindDomainByIdAction;
use App\Containers\AppSection\Shop\Actions\GetAllDomainsAction;
use App\Containers\AppSection\Shop\Actions\UpdateDomainAction;
use App\Containers\AppSection\Shop\UI\API\Requests\CreateDomainRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\DeleteDomainRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\FindDomainByIdRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\GetAllDomainsRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\UpdateDomainRequest;
use App\Containers\AppSection\Shop\UI\API\Transformers\DomainTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class DomainController extends ApiController
{
    /**
     * @param CreateDomainRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createDomain(CreateDomainRequest $request): JsonResponse
    {
        $domain = app(CreateDomainAction::class)->run($request);

        return $this->created($this->transform($domain, DomainTransformer::class));
    }

    /**
     * @param FindDomainByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findDomainById(FindDomainByIdRequest $request): array
    {
        $domain = app(FindDomainByIdAction::class)->run($request);

        return $this->transform($domain, DomainTransformer::class);
    }

    /**
     * @param GetAllDomainsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllDomains(GetAllDomainsRequest $request): array
    {
        $domains = app(GetAllDomainsAction::class)->run($request);

        return $this->transform($domains, DomainTransformer::class);
    }

    /**
     * @param UpdateDomainRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateDomain(UpdateDomainRequest $request): array
    {
        $domain = app(UpdateDomainAction::class)->run($request);

        return $this->transform($domain, DomainTransformer::class);
    }

    /**
     * @param DeleteDomainRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteDomain(DeleteDomainRequest $request): JsonResponse
    {
        app(DeleteDomainAction::class)->run($request);

        return $this->noContent();
    }
}
