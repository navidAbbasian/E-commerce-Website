<?php

namespace App\Containers\AppSection\Carousel\Tasks;

use App\Containers\AppSection\Carousel\Data\Repositories\CarouselRepository;
use App\Containers\AppSection\Carousel\Events\CarouselDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteCarouselTask extends ParentTask
{
    public function __construct(
        protected CarouselRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            CarouselDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
