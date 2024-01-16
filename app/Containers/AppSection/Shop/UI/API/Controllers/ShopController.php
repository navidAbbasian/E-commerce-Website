<?php

namespace App\Containers\AppSection\Shop\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Shop\Actions\CreateShopAction;
use App\Containers\AppSection\Shop\Actions\DeleteShopAction;
use App\Containers\AppSection\Shop\Actions\FindShopByIdAction;
use App\Containers\AppSection\Shop\Actions\GetAllShopsAction;
use App\Containers\AppSection\Shop\Actions\UpdateShopAction;
use App\Containers\AppSection\Shop\UI\API\Requests\CreateShopRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\DeleteShopRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\FindShopByIdRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\GetAllShopsRequest;
use App\Containers\AppSection\Shop\UI\API\Requests\UpdateShopRequest;
use App\Containers\AppSection\Shop\UI\API\Transformers\ShopTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class ShopController extends ApiController
{
    /**
     * @param CreateShopRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createShop(CreateShopRequest $request): JsonResponse
    {
        $shop = app(CreateShopAction::class)->run($request);

        return $this->created($this->transform($shop, ShopTransformer::class));
    }

    /**
     * @param FindShopByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findShopById(FindShopByIdRequest $request): array
    {
        $shop = app(FindShopByIdAction::class)->run($request);

        return $this->transform($shop, ShopTransformer::class);
    }

    /**
     * @param GetAllShopsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllShops(GetAllShopsRequest $request): array
    {
        $shops = app(GetAllShopsAction::class)->run($request);

        return $this->transform($shops, ShopTransformer::class);
    }

    /**
     * @param UpdateShopRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateShop(UpdateShopRequest $request): array
    {
        $shop = app(UpdateShopAction::class)->run($request);

        return $this->transform($shop, ShopTransformer::class);
    }

    /**
     * @param DeleteShopRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteShop(DeleteShopRequest $request): JsonResponse
    {
        app(DeleteShopAction::class)->run($request);

        return $this->noContent();
    }
}
