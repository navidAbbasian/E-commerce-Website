<?php

namespace App\Containers\AppSection\Banner\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Banner\Actions\CreateBannerAction;
use App\Containers\AppSection\Banner\Actions\DeleteBannerAction;
use App\Containers\AppSection\Banner\Actions\FindBannerByIdAction;
use App\Containers\AppSection\Banner\Actions\GetAllBannersAction;
use App\Containers\AppSection\Banner\Actions\UpdateBannerAction;
use App\Containers\AppSection\Banner\UI\API\Requests\CreateBannerRequest;
use App\Containers\AppSection\Banner\UI\API\Requests\DeleteBannerRequest;
use App\Containers\AppSection\Banner\UI\API\Requests\FindBannerByIdRequest;
use App\Containers\AppSection\Banner\UI\API\Requests\GetAllBannersRequest;
use App\Containers\AppSection\Banner\UI\API\Requests\UpdateBannerRequest;
use App\Containers\AppSection\Banner\UI\API\Transformers\BannerTransformer;
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
     * @param CreateBannerRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createBanner(CreateBannerRequest $request): JsonResponse
    {
        $banner = app(CreateBannerAction::class)->run($request);

        return $this->created($this->transform($banner, BannerTransformer::class));
    }

    /**
     * @param FindBannerByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findBannerById(FindBannerByIdRequest $request): array
    {
        $banner = app(FindBannerByIdAction::class)->run($request);

        return $this->transform($banner, BannerTransformer::class);
    }

    /**
     * @param GetAllBannersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllBanners(GetAllBannersRequest $request): array
    {
        $banners = app(GetAllBannersAction::class)->run($request);

        return $this->transform($banners, BannerTransformer::class);
    }

    /**
     * @param UpdateBannerRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateBanner(UpdateBannerRequest $request): array
    {
        $banner = app(UpdateBannerAction::class)->run($request);

        return $this->transform($banner, BannerTransformer::class);
    }

    /**
     * @param DeleteBannerRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteBanner(DeleteBannerRequest $request): JsonResponse
    {
        app(DeleteBannerAction::class)->run($request);

        return $this->noContent();
    }
}
