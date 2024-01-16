<?php

namespace App\Containers\AppSection\Brand\Actions;

use App\Containers\AppSection\Brand\Tasks\DeleteBrandTask;
use App\Containers\AppSection\Brand\UI\API\Requests\DeleteBrandRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteBrandAction extends ParentAction
{
    /**
     * @param DeleteBrandRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteBrandRequest $request): int
    {
        return app(DeleteBrandTask::class)->run($request->id);
    }
}
