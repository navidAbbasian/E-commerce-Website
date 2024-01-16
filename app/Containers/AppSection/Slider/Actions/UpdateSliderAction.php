<?php

namespace App\Containers\AppSection\Slider\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tasks\UpdateSliderTask;
use App\Containers\AppSection\Slider\UI\API\Requests\UpdateSliderRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSliderAction extends ParentAction
{
    /**
     * @param UpdateSliderRequest $request
     * @return Slider
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSliderRequest $request): Slider
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'order',
            'link',
        ]);

        return app(UpdateSliderTask::class)->run($data, $request->id);
    }
}
