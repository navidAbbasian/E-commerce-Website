<?php

namespace App\Containers\AppSection\Category\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\CreateCategoryTask;
use App\Containers\AppSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCategoryAction extends ParentAction
{
    /**
     * @param CreateCategoryRequest $request
     * @return Category
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCategoryRequest $request): Category
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'parent_id',
            'title',
            'meta_title',
            'description',
            'meta_description',
            'order',
        ]);

        return app(CreateCategoryTask::class)->run($data);
    }
}
