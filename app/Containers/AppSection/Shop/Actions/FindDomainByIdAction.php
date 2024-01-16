<?php

namespace App\Containers\AppSection\Shop\Actions;

use App\Containers\AppSection\Shop\Models\Domain;
use App\Containers\AppSection\Shop\Tasks\FindDomainByIdTask;
use App\Containers\AppSection\Shop\UI\API\Requests\FindDomainByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindDomainByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindDomainByIdRequest $request): Domain
    {
        return app(FindDomainByIdTask::class)->run($request->id);
    }
}
