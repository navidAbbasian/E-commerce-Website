<?php

namespace App\Containers\AppSection\Slider\Actions;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tasks\FindSliderByIdTask;
use App\Containers\AppSection\Slider\UI\API\Requests\FindSliderByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSliderByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSliderByIdRequest $request): Slider
    {
        return app(FindSliderByIdTask::class)->run($request->id);
    }
}
