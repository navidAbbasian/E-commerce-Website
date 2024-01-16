<?php

namespace App\Containers\AppSection\Brand\Tasks;

use App\Containers\AppSection\Brand\Data\Repositories\BrandRepository;
use App\Containers\AppSection\Brand\Events\BrandFoundByIdEvent;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBrandByIdTask extends ParentTask
{
    public function __construct(
        protected BrandRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Brand
    {
        try {
            $brand = $this->repository->find($id);
            BrandFoundByIdEvent::dispatch($brand);

            return $brand;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
