<?php

namespace App\Containers\AppSection\Carousel\Tasks;

use App\Containers\AppSection\Carousel\Data\Repositories\CarouselRepository;
use App\Containers\AppSection\Carousel\Events\CarouselCreatedEvent;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCarouselTask extends ParentTask
{
    public function __construct(
        protected CarouselRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Carousel
    {
        try {
            $carousel = $this->repository->create($data);
            CarouselCreatedEvent::dispatch($carousel);

            return $carousel;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
