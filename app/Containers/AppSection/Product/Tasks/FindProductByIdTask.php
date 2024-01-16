<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Events\ProductFoundByIdEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindProductByIdTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Product
    {
        try {
            $product = $this->repository->find($id);
            ProductFoundByIdEvent::dispatch($product);

            return $product;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
