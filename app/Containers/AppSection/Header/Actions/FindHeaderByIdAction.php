<?php

namespace App\Containers\AppSection\Header\Actions;

use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tasks\FindHeaderByIdTask;
use App\Containers\AppSection\Header\UI\API\Requests\FindHeaderByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindHeaderByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindHeaderByIdRequest $request): Header
    {
        return app(FindHeaderByIdTask::class)->run($request->id);
    }
}
