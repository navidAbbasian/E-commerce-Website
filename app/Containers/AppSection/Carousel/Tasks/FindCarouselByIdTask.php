<?php

namespace App\Containers\AppSection\Carousel\Tasks;

use App\Containers\AppSection\Carousel\Data\Repositories\CarouselRepository;
use App\Containers\AppSection\Carousel\Events\CarouselFoundByIdEvent;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCarouselByIdTask extends ParentTask
{
    public function __construct(
        protected CarouselRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Carousel
    {
        try {
            $carousel = $this->repository->find($id);
            CarouselFoundByIdEvent::dispatch($carousel);

            return $carousel;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
