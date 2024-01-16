<?php

namespace App\Containers\AppSection\Slider\Actions;

use App\Containers\AppSection\Slider\Tasks\DeleteSliderTask;
use App\Containers\AppSection\Slider\UI\API\Requests\DeleteSliderRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSliderAction extends ParentAction
{
    /**
     * @param DeleteSliderRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSliderRequest $request): int
    {
        return app(DeleteSliderTask::class)->run($request->id);
    }
}
