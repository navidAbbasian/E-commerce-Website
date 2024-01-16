<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoryUpdatedEvent;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCategoryTask extends ParentTask
{
    public function __construct(
        protected CategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Category
    {
        try {
            $category = $this->repository->update($data, $id);
            CategoryUpdatedEvent::dispatch($category);

            return $category;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
