<?php

namespace App\Containers\AppSection\Brand\Tasks;

use App\Containers\AppSection\Brand\Data\Repositories\BrandRepository;
use App\Containers\AppSection\Brand\Events\BrandUpdatedEvent;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateBrandTask extends ParentTask
{
    public function __construct(
        protected BrandRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Brand
    {
        try {
            $brand = $this->repository->update($data, $id);
            BrandUpdatedEvent::dispatch($brand);

            return $brand;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
