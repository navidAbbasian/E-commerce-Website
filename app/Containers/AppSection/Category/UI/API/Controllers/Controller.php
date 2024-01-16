<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\CreateCategoryAction;
use App\Containers\AppSection\Category\Actions\DeleteCategoryAction;
use App\Containers\AppSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\AppSection\Category\Actions\GetAllCategoriesAction;
use App\Containers\AppSection\Category\Actions\UpdateCategoryAction;
use App\Containers\AppSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Containers\AppSection\Category\UI\API\Requests\GetAllCategoriesRequest;
use App\Containers\AppSection\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
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
     * @param CreateCategoryRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createCategory(CreateCategoryRequest $request): JsonResponse
    {
        $category = app(CreateCategoryAction::class)->run($request);

        return $this->created($this->transform($category, CategoryTransformer::class));
    }

    /**
     * @param FindCategoryByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCategoryById(FindCategoryByIdRequest $request): array
    {
        $category = app(FindCategoryByIdAction::class)->run($request);

        return $this->transform($category, CategoryTransformer::class);
    }

    /**
     * @param GetAllCategoriesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCategories(GetAllCategoriesRequest $request): array
    {
        $categories = app(GetAllCategoriesAction::class)->run($request);

        return $this->transform($categories, CategoryTransformer::class);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateCategory(UpdateCategoryRequest $request): array
    {
        $category = app(UpdateCategoryAction::class)->run($request);

        return $this->transform($category, CategoryTransformer::class);
    }

    /**
     * @param DeleteCategoryRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteCategory(DeleteCategoryRequest $request): JsonResponse
    {
        app(DeleteCategoryAction::class)->run($request);

        return $this->noContent();
    }
}
