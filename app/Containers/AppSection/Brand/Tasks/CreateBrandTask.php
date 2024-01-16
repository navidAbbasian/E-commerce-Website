<?php

namespace App\Containers\AppSection\Brand\Tasks;

use App\Containers\AppSection\Brand\Data\Repositories\BrandRepository;
use App\Containers\AppSection\Brand\Events\BrandCreatedEvent;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateBrandTask extends ParentTask
{
    public function __construct(
        protected BrandRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Brand
    {
        try {
            $brand = $this->repository->create($data);
            BrandCreatedEvent::dispatch($brand);

            return $brand;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
