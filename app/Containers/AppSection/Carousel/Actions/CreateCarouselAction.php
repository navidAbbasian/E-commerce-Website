<?php

namespace App\Containers\AppSection\Carousel\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tasks\CreateCarouselTask;
use App\Containers\AppSection\Carousel\UI\API\Requests\CreateCarouselRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCarouselAction extends ParentAction
{
    /**
     * @param CreateCarouselRequest $request
     * @return Carousel
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCarouselRequest $request): Carousel
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shop_id',
            'category_id',
            'title',
            'order',
            'type',
        ]);

        return app(CreateCarouselTask::class)->run($data);
    }
}
