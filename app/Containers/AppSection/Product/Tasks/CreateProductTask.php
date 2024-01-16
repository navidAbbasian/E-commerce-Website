<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Events\ProductCreatedEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateProductTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Product
    {
        try {
            $product = $this->repository->create($data);
            ProductCreatedEvent::dispatch($product);

            return $product;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
