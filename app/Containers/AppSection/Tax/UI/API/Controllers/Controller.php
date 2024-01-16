<?php

namespace App\Containers\AppSection\Tax\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Tax\Actions\CreateTaxAction;
use App\Containers\AppSection\Tax\Actions\DeleteTaxAction;
use App\Containers\AppSection\Tax\Actions\FindTaxByIdAction;
use App\Containers\AppSection\Tax\Actions\GetAllTaxesAction;
use App\Containers\AppSection\Tax\Actions\UpdateTaxAction;
use App\Containers\AppSection\Tax\UI\API\Requests\CreateTaxRequest;
use App\Containers\AppSection\Tax\UI\API\Requests\DeleteTaxRequest;
use App\Containers\AppSection\Tax\UI\API\Requests\FindTaxByIdRequest;
use App\Containers\AppSection\Tax\UI\API\Requests\GetAllTaxesRequest;
use App\Containers\AppSection\Tax\UI\API\Requests\UpdateTaxRequest;
use App\Containers\AppSection\Tax\UI\API\Transformers\TaxTransformer;
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
     * @param CreateTaxRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createTax(CreateTaxRequest $request): JsonResponse
    {
        $tax = app(CreateTaxAction::class)->run($request);

        return $this->created($this->transform($tax, TaxTransformer::class));
    }

    /**
     * @param FindTaxByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findTaxById(FindTaxByIdRequest $request): array
    {
        $tax = app(FindTaxByIdAction::class)->run($request);

        return $this->transform($tax, TaxTransformer::class);
    }

    /**
     * @param GetAllTaxesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllTaxes(GetAllTaxesRequest $request): array
    {
        $taxes = app(GetAllTaxesAction::class)->run($request);

        return $this->transform($taxes, TaxTransformer::class);
    }

    /**
     * @param UpdateTaxRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateTax(UpdateTaxRequest $request): array
    {
        $tax = app(UpdateTaxAction::class)->run($request);

        return $this->transform($tax, TaxTransformer::class);
    }

    /**
     * @param DeleteTaxRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteTax(DeleteTaxRequest $request): JsonResponse
    {
        app(DeleteTaxAction::class)->run($request);

        return $this->noContent();
    }
}
