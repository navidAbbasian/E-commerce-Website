<?php

namespace App\Containers\AppSection\Province\Tasks;

use App\Containers\AppSection\Province\Data\Repositories\CityRepository;
use App\Containers\AppSection\Province\Events\CityFoundByIdEvent;
use App\Containers\AppSection\Province\Models\City;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCityByIdTask extends ParentTask
{
    public function __construct(
        protected CityRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): City
    {
        try {
            $city = $this->repository->find($id);
            CityFoundByIdEvent::dispatch($city);

            return $city;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
