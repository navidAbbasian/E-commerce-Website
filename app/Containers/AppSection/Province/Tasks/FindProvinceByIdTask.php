<?php

namespace App\Containers\AppSection\Province\Tasks;

use App\Containers\AppSection\Province\Data\Repositories\ProvinceRepository;
use App\Containers\AppSection\Province\Events\ProvinceFoundByIdEvent;
use App\Containers\AppSection\Province\Models\Province;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindProvinceByIdTask extends ParentTask
{
    public function __construct(
        protected ProvinceRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Province
    {
        try {
            $province = $this->repository->find($id);
            ProvinceFoundByIdEvent::dispatch($province);

            return $province;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
