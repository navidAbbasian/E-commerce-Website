<?php

namespace App\Containers\AppSection\Slider\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tasks\CreateSliderTask;
use App\Containers\AppSection\Slider\UI\API\Requests\CreateSliderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSliderAction extends ParentAction
{
    /**
     * @param CreateSliderRequest $request
     * @return Slider
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSliderRequest $request): Slider
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shop_id',
            'title',
            'order',
            'link',
        ]);

        return app(CreateSliderTask::class)->run($data);
    }
}
