<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Events\ProductUpdatedEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateProductTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Product
    {
        try {
            $product = $this->repository->update($data, $id);
            ProductUpdatedEvent::dispatch($product);

            return $product;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
