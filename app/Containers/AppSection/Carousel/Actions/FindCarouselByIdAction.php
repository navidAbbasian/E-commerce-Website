<?php

namespace App\Containers\AppSection\Carousel\Actions;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tasks\FindCarouselByIdTask;
use App\Containers\AppSection\Carousel\UI\API\Requests\FindCarouselByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCarouselByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCarouselByIdRequest $request): Carousel
    {
        return app(FindCarouselByIdTask::class)->run($request->id);
    }
}
