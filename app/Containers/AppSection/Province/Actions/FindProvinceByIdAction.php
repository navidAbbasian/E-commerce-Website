<?php

namespace App\Containers\AppSection\Province\Actions;

use App\Containers\AppSection\Province\Models\Province;
use App\Containers\AppSection\Province\Tasks\FindProvinceByIdTask;
use App\Containers\AppSection\Province\UI\API\Requests\FindProvinceByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProvinceByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindProvinceByIdRequest $request): Province
    {
        return app(FindProvinceByIdTask::class)->run($request->id);
    }
}
