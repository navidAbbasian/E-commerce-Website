<?php

namespace App\Containers\AppSection\Tag\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Tag\Tasks\GetAllTagsTask;
use App\Containers\AppSection\Tag\UI\API\Requests\GetAllTagsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTagsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllTagsRequest $request): mixed
    {
        return app(GetAllTagsTask::class)->run();
    }
}
