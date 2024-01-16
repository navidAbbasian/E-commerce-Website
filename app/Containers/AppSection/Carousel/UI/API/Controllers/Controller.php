<?php

namespace App\Containers\AppSection\Carousel\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Carousel\Actions\CreateCarouselAction;
use App\Containers\AppSection\Carousel\Actions\DeleteCarouselAction;
use App\Containers\AppSection\Carousel\Actions\FindCarouselByIdAction;
use App\Containers\AppSection\Carousel\Actions\GetAllCarouselsAction;
use App\Containers\AppSection\Carousel\Actions\UpdateCarouselAction;
use App\Containers\AppSection\Carousel\UI\API\Requests\CreateCarouselRequest;
use App\Containers\AppSection\Carousel\UI\API\Requests\DeleteCarouselRequest;
use App\Containers\AppSection\Carousel\UI\API\Requests\FindCarouselByIdRequest;
use App\Containers\AppSection\Carousel\UI\API\Requests\GetAllCarouselsRequest;
use App\Containers\AppSection\Carousel\UI\API\Requests\UpdateCarouselRequest;
use App\Containers\AppSection\Carousel\UI\API\Transformers\CarouselTransformer;
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
     * @param CreateCarouselRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createCarousel(CreateCarouselRequest $request): JsonResponse
    {
        $carousel = app(CreateCarouselAction::class)->run($request);

        return $this->created($this->transform($carousel, CarouselTransformer::class));
    }

    /**
     * @param FindCarouselByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCarouselById(FindCarouselByIdRequest $request): array
    {
        $carousel = app(FindCarouselByIdAction::class)->run($request);

        return $this->transform($carousel, CarouselTransformer::class);
    }

    /**
     * @param GetAllCarouselsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCarousels(GetAllCarouselsRequest $request): array
    {
        $carousels = app(GetAllCarouselsAction::class)->run($request);

        return $this->transform($carousels, CarouselTransformer::class);
    }

    /**
     * @param UpdateCarouselRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateCarousel(UpdateCarouselRequest $request): array
    {
        $carousel = app(UpdateCarouselAction::class)->run($request);

        return $this->transform($carousel, CarouselTransformer::class);
    }

    /**
     * @param DeleteCarouselRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteCarousel(DeleteCarouselRequest $request): JsonResponse
    {
        app(DeleteCarouselAction::class)->run($request);

        return $this->noContent();
    }
}
