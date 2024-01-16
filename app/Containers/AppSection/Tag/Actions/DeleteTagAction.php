<?php

namespace App\Containers\AppSection\Tag\Actions;

use App\Containers\AppSection\Tag\Tasks\DeleteTagTask;
use App\Containers\AppSection\Tag\UI\API\Requests\DeleteTagRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTagAction extends ParentAction
{
    /**
     * @param DeleteTagRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTagRequest $request): int
    {
        return app(DeleteTagTask::class)->run($request->id);
    }
}
