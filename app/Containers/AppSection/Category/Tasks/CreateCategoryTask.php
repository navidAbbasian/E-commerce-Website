<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoryCreatedEvent;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCategoryTask extends ParentTask
{
    public function __construct(
        protected CategoryRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Category
    {
        try {
            $category = $this->repository->create($data);
            CategoryCreatedEvent::dispatch($category);

            return $category;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
