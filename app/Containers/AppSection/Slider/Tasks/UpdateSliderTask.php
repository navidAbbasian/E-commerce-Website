<?php

namespace App\Containers\AppSection\Slider\Tasks;

use App\Containers\AppSection\Slider\Data\Repositories\SliderRepository;
use App\Containers\AppSection\Slider\Events\SliderUpdatedEvent;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSliderTask extends ParentTask
{
    public function __construct(
        protected SliderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Slider
    {
        try {
            $slider = $this->repository->update($data, $id);
            SliderUpdatedEvent::dispatch($slider);

            return $slider;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
