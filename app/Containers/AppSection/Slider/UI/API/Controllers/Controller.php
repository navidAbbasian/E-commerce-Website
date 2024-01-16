<?php

namespace App\Containers\AppSection\Slider\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Slider\Actions\CreateSliderAction;
use App\Containers\AppSection\Slider\Actions\DeleteSliderAction;
use App\Containers\AppSection\Slider\Actions\FindSliderByIdAction;
use App\Containers\AppSection\Slider\Actions\GetAllSlidersAction;
use App\Containers\AppSection\Slider\Actions\UpdateSliderAction;
use App\Containers\AppSection\Slider\UI\API\Requests\CreateSliderRequest;
use App\Containers\AppSection\Slider\UI\API\Requests\DeleteSliderRequest;
use App\Containers\AppSection\Slider\UI\API\Requests\FindSliderByIdRequest;
use App\Containers\AppSection\Slider\UI\API\Requests\GetAllSlidersRequest;
use App\Containers\AppSection\Slider\UI\API\Requests\UpdateSliderRequest;
use App\Containers\AppSection\Slider\UI\API\Transformers\SliderTransformer;
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
     * @param CreateSliderRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSlider(CreateSliderRequest $request): JsonResponse
    {
        $slider = app(CreateSliderAction::class)->run($request);

        return $this->created($this->transform($slider, SliderTransformer::class));
    }

    /**
     * @param FindSliderByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSliderById(FindSliderByIdRequest $request): array
    {
        $slider = app(FindSliderByIdAction::class)->run($request);

        return $this->transform($slider, SliderTransformer::class);
    }

    /**
     * @param GetAllSlidersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSliders(GetAllSlidersRequest $request): array
    {
        $sliders = app(GetAllSlidersAction::class)->run($request);

        return $this->transform($sliders, SliderTransformer::class);
    }

    /**
     * @param UpdateSliderRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSlider(UpdateSliderRequest $request): array
    {
        $slider = app(UpdateSliderAction::class)->run($request);

        return $this->transform($slider, SliderTransformer::class);
    }

    /**
     * @param DeleteSliderRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSlider(DeleteSliderRequest $request): JsonResponse
    {
        app(DeleteSliderAction::class)->run($request);

        return $this->noContent();
    }
}
