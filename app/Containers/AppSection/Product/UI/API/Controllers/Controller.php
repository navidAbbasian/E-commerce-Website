<?php

namespace App\Containers\AppSection\Product\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Product\Actions\CreateProductAction;
use App\Containers\AppSection\Product\Actions\DeleteProductAction;
use App\Containers\AppSection\Product\Actions\FindProductByIdAction;
use App\Containers\AppSection\Product\Actions\GetAllProductsAction;
use App\Containers\AppSection\Product\Actions\UpdateProductAction;
use App\Containers\AppSection\Product\UI\API\Requests\CreateProductRequest;
use App\Containers\AppSection\Product\UI\API\Requests\DeleteProductRequest;
use App\Containers\AppSection\Product\UI\API\Requests\FindProductByIdRequest;
use App\Containers\AppSection\Product\UI\API\Requests\GetAllProductsRequest;
use App\Containers\AppSection\Product\UI\API\Requests\UpdateProductRequest;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
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
     * @param CreateProductRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createProduct(CreateProductRequest $request): JsonResponse
    {
        $product = app(CreateProductAction::class)->run($request);

        return $this->created($this->transform($product, ProductTransformer::class));
    }

    /**
     * @param FindProductByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findProductById(FindProductByIdRequest $request): array
    {
        $product = app(FindProductByIdAction::class)->run($request);

        return $this->transform($product, ProductTransformer::class);
    }

    /**
     * @param GetAllProductsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllProducts(GetAllProductsRequest $request): array
    {
        $products = app(GetAllProductsAction::class)->run($request);

        return $this->transform($products, ProductTransformer::class);
    }

    /**
     * @param UpdateProductRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateProduct(UpdateProductRequest $request): array
    {
        $product = app(UpdateProductAction::class)->run($request);

        return $this->transform($product, ProductTransformer::class);
    }

    /**
     * @param DeleteProductRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteProduct(DeleteProductRequest $request): JsonResponse
    {
        app(DeleteProductAction::class)->run($request);

        return $this->noContent();
    }
}
