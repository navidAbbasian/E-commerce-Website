<?php

namespace App\Containers\AppSection\Province\Tasks;

use App\Containers\AppSection\Province\Data\Repositories\ProvinceRepository;
use App\Containers\AppSection\Province\Events\ProvinceCreatedEvent;
use App\Containers\AppSection\Province\Models\Province;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateProvinceTask extends ParentTask
{
    public function __construct(
        protected ProvinceRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Province
    {
        try {
            $province = $this->repository->create($data);
            ProvinceCreatedEvent::dispatch($province);

            return $province;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
