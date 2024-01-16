<?php

namespace App\Containers\AppSection\Brand\Actions;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tasks\FindBrandByIdTask;
use App\Containers\AppSection\Brand\UI\API\Requests\FindBrandByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBrandByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBrandByIdRequest $request): Brand
    {
        return app(FindBrandByIdTask::class)->run($request->id);
    }
}
