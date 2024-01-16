<?php

namespace App\Containers\AppSection\Slider\Tasks;

use App\Containers\AppSection\Slider\Data\Repositories\SliderRepository;
use App\Containers\AppSection\Slider\Events\SliderCreatedEvent;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateSliderTask extends ParentTask
{
    public function __construct(
        protected SliderRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Slider
    {
        try {
            $slider = $this->repository->create($data);
            SliderCreatedEvent::dispatch($slider);

            return $slider;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
