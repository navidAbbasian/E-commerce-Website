<?php

namespace App\Containers\AppSection\Slider\Tasks;

use App\Containers\AppSection\Slider\Data\Repositories\SliderRepository;
use App\Containers\AppSection\Slider\Events\SliderFoundByIdEvent;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSliderByIdTask extends ParentTask
{
    public function __construct(
        protected SliderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Slider
    {
        try {
            $slider = $this->repository->find($id);
            SliderFoundByIdEvent::dispatch($slider);

            return $slider;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
