<?php

namespace App\Containers\AppSection\Banner\Actions;

use App\Containers\AppSection\Banner\Tasks\DeleteBannerTask;
use App\Containers\AppSection\Banner\UI\API\Requests\DeleteBannerRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteBannerAction extends ParentAction
{
    /**
     * @param DeleteBannerRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteBannerRequest $request): int
    {
        return app(DeleteBannerTask::class)->run($request->id);
    }
}
