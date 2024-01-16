<?php

namespace App\Containers\AppSection\Banner\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tasks\CreateBannerTask;
use App\Containers\AppSection\Banner\UI\API\Requests\CreateBannerRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateBannerAction extends ParentAction
{
    /**
     * @param CreateBannerRequest $request
     * @return Banner
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateBannerRequest $request): Banner
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shop_id',
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

        return app(CreateBannerTask::class)->run($data);
    }
}
