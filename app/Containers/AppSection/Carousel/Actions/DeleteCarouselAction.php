<?php

namespace App\Containers\AppSection\Carousel\Actions;

use App\Containers\AppSection\Carousel\Tasks\DeleteCarouselTask;
use App\Containers\AppSection\Carousel\UI\API\Requests\DeleteCarouselRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCarouselAction extends ParentAction
{
    /**
     * @param DeleteCarouselRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCarouselRequest $request): int
    {
        return app(DeleteCarouselTask::class)->run($request->id);
    }
}
