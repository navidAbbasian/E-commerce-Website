<?php

namespace App\Containers\AppSection\Banner\Actions;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tasks\FindBannerByIdTask;
use App\Containers\AppSection\Banner\UI\API\Requests\FindBannerByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBannerByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBannerByIdRequest $request): Banner
    {
        return app(FindBannerByIdTask::class)->run($request->id);
    }
}
