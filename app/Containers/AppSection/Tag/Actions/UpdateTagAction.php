<?php

namespace App\Containers\AppSection\Tag\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\Tasks\UpdateTagTask;
use App\Containers\AppSection\Tag\UI\API\Requests\UpdateTagRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTagAction extends ParentAction
{
    /**
     * @param UpdateTagRequest $request
     * @return Tag
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTagRequest $request): Tag
    {
        $data = $request->sanitizeInput([
            'title',
            'meta_title',
            'description',
            'meta_description',
        ]);

        return app(UpdateTagTask::class)->run($data, $request->id);
    }
}
