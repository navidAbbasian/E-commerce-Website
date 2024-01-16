<?php

namespace App\Containers\AppSection\Tax\Actions;

use App\Containers\AppSection\Tax\Tasks\DeleteTaxTask;
use App\Containers\AppSection\Tax\UI\API\Requests\DeleteTaxRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTaxAction extends ParentAction
{
    /**
     * @param DeleteTaxRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTaxRequest $request): int
    {
        return app(DeleteTaxTask::class)->run($request->id);
    }
}
