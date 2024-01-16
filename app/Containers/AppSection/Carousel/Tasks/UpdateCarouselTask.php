<?php

namespace App\Containers\AppSection\Carousel\Tasks;

use App\Containers\AppSection\Carousel\Data\Repositories\CarouselRepository;
use App\Containers\AppSection\Carousel\Events\CarouselUpdatedEvent;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCarouselTask extends ParentTask
{
    public function __construct(
        protected CarouselRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Carousel
    {
        try {
            $carousel = $this->repository->update($data, $id);
            CarouselUpdatedEvent::dispatch($carousel);

            return $carousel;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
