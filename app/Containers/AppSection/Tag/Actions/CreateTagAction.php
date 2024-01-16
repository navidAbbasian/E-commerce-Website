<?php

namespace App\Containers\AppSection\Tag\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\Tasks\CreateTagTask;
use App\Containers\AppSection\Tag\UI\API\Requests\CreateTagRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTagAction extends ParentAction
{
    /**
     * @param CreateTagRequest $request
     * @return Tag
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateTagRequest $request): Tag
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'title',
            'meta_title',
            'description',
            'meta_description',
        ]);

        return app(CreateTagTask::class)->run($data);
    }
}
