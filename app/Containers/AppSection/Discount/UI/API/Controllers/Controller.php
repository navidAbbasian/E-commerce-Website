<?php

namespace App\Containers\AppSection\Discount\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Discount\Actions\CreateDiscountAction;
use App\Containers\AppSection\Discount\Actions\DeleteDiscountAction;
use App\Containers\AppSection\Discount\Actions\FindDiscountByIdAction;
use App\Containers\AppSection\Discount\Actions\GetAllDiscountsAction;
use App\Containers\AppSection\Discount\Actions\UpdateDiscountAction;
use App\Containers\AppSection\Discount\UI\API\Requests\CreateDiscountRequest;
use App\Containers\AppSection\Discount\UI\API\Requests\DeleteDiscountRequest;
use App\Containers\AppSection\Discount\UI\API\Requests\FindDiscountByIdRequest;
use App\Containers\AppSection\Discount\UI\API\Requests\GetAllDiscountsRequest;
use App\Containers\AppSection\Discount\UI\API\Requests\UpdateDiscountRequest;
use App\Containers\AppSection\Discount\UI\API\Transformers\DiscountTransformer;
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
     * @param CreateDiscountRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createDiscount(CreateDiscountRequest $request): JsonResponse
    {
        $discount = app(CreateDiscountAction::class)->run($request);

        return $this->created($this->transform($discount, DiscountTransformer::class));
    }

    /**
     * @param FindDiscountByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findDiscountById(FindDiscountByIdRequest $request): array
    {
        $discount = app(FindDiscountByIdAction::class)->run($request);

        return $this->transform($discount, DiscountTransformer::class);
    }

    /**
     * @param GetAllDiscountsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllDiscounts(GetAllDiscountsRequest $request): array
    {
        $discounts = app(GetAllDiscountsAction::class)->run($request);

        return $this->transform($discounts, DiscountTransformer::class);
    }

    /**
     * @param UpdateDiscountRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateDiscount(UpdateDiscountRequest $request): array
    {
        $discount = app(UpdateDiscountAction::class)->run($request);

        return $this->transform($discount, DiscountTransformer::class);
    }

    /**
     * @param DeleteDiscountRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteDiscount(DeleteDiscountRequest $request): JsonResponse
    {
        app(DeleteDiscountAction::class)->run($request);

        return $this->noContent();
    }
}
