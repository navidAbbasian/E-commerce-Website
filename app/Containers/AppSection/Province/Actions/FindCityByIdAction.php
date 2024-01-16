<?php

namespace App\Containers\AppSection\Province\Actions;

use App\Containers\AppSection\Province\Models\City;
use App\Containers\AppSection\Province\Tasks\FindCityByIdTask;
use App\Containers\AppSection\Province\UI\API\Requests\FindCityByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCityByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindCityByIdRequest $request): City
    {
        return app(FindCityByIdTask::class)->run($request->id);
    }
}
