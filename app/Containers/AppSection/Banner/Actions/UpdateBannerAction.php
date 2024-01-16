<?php

namespace App\Containers\AppSection\Banner\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tasks\UpdateBannerTask;
use App\Containers\AppSection\Banner\UI\API\Requests\UpdateBannerRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateBannerAction extends ParentAction
{
    /**
     * @param UpdateBannerRequest $request
     * @return Banner
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateBannerRequest $request): Banner
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'alt',
            'link',
            'order',
            'column',
            'page',
            'situation',
            'position',
            'status',
        ]);

        return app(UpdateBannerTask::class)->run($data, $request->id);
    }
}
