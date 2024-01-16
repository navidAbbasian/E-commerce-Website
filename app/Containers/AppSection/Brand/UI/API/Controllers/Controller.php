<?php

namespace App\Containers\AppSection\Brand\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Brand\Actions\CreateBrandAction;
use App\Containers\AppSection\Brand\Actions\DeleteBrandAction;
use App\Containers\AppSection\Brand\Actions\FindBrandByIdAction;
use App\Containers\AppSection\Brand\Actions\GetAllBrandsAction;
use App\Containers\AppSection\Brand\Actions\UpdateBrandAction;
use App\Containers\AppSection\Brand\UI\API\Requests\CreateBrandRequest;
use App\Containers\AppSection\Brand\UI\API\Requests\DeleteBrandRequest;
use App\Containers\AppSection\Brand\UI\API\Requests\FindBrandByIdRequest;
use App\Containers\AppSection\Brand\UI\API\Requests\GetAllBrandsRequest;
use App\Containers\AppSection\Brand\UI\API\Requests\UpdateBrandRequest;
use App\Containers\AppSection\Brand\UI\API\Transformers\BrandTransformer;
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
     * @param CreateBrandRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createBrand(CreateBrandRequest $request): JsonResponse
    {
        $brand = app(CreateBrandAction::class)->run($request);

        return $this->created($this->transform($brand, BrandTransformer::class));
    }

    /**
     * @param FindBrandByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findBrandById(FindBrandByIdRequest $request): array
    {
        $brand = app(FindBrandByIdAction::class)->run($request);

        return $this->transform($brand, BrandTransformer::class);
    }

    /**
     * @param GetAllBrandsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBrands(GetAllBrandsRequest $request): array
    {
        $brands = app(GetAllBrandsAction::class)->run($request);

        return $this->transform($brands, BrandTransformer::class);
    }

    /**
     * @param UpdateBrandRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateBrand(UpdateBrandRequest $request): array
    {
        $brand = app(UpdateBrandAction::class)->run($request);

        return $this->transform($brand, BrandTransformer::class);
    }

    /**
     * @param DeleteBrandRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteBrand(DeleteBrandRequest $request): JsonResponse
    {
        app(DeleteBrandAction::class)->run($request);

        return $this->noContent();
    }
}
