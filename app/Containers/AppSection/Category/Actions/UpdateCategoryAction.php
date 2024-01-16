<?php

namespace App\Containers\AppSection\Category\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\UpdateCategoryTask;
use App\Containers\AppSection\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCategoryAction extends ParentAction
{
    /**
     * @param UpdateCategoryRequest $request
     * @return Category
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCategoryRequest $request): Category
    {
        $data = $request->sanitizeInput([
            'parent_id',
            'title',
            'meta_title',
            'description',
            'meta_description',
            'order',
        ]);

        return app(UpdateCategoryTask::class)->run($data, $request->id);
    }
}
