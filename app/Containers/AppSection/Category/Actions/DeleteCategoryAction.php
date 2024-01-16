<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Tasks\DeleteCategoryTask;
use App\Containers\AppSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCategoryAction extends ParentAction
{
    /**
     * @param DeleteCategoryRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteCategoryRequest $request): int
    {
        return app(DeleteCategoryTask::class)->run($request->id);
    }
}
