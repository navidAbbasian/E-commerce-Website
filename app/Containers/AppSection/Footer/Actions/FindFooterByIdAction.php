<?php

namespace App\Containers\AppSection\Footer\Actions;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\Tasks\FindFooterByIdTask;
use App\Containers\AppSection\Footer\UI\API\Requests\FindFooterByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindFooterByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindFooterByIdRequest $request): Footer
    {
        return app(FindFooterByIdTask::class)->run($request->id);
    }
}
