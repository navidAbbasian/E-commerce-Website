<?php

namespace App\Containers\AppSection\Carousel\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tasks\UpdateCarouselTask;
use App\Containers\AppSection\Carousel\UI\API\Requests\UpdateCarouselRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCarouselAction extends ParentAction
{
    /**
     * @param UpdateCarouselRequest $request
     * @return Carousel
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCarouselRequest $request): Carousel
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'category_id',
            'title',
            'order',
            'type',
        ]);

        return app(UpdateCarouselTask::class)->run($data, $request->id);
    }
}
