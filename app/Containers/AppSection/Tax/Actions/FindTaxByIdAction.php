<?php

namespace App\Containers\AppSection\Tax\Actions;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tasks\FindTaxByIdTask;
use App\Containers\AppSection\Tax\UI\API\Requests\FindTaxByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTaxByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindTaxByIdRequest $request): Tax
    {
        return app(FindTaxByIdTask::class)->run($request->id);
    }
}
