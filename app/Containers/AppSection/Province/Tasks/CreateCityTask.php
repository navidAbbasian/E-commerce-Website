<?php

namespace App\Containers\AppSection\Province\Tasks;

use App\Containers\AppSection\Province\Data\Repositories\CityRepository;
use App\Containers\AppSection\Province\Events\CityCreatedEvent;
use App\Containers\AppSection\Province\Models\City;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCityTask extends ParentTask
{
    public function __construct(
        protected CityRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): City
    {
        try {
            $city = $this->repository->create($data);
            CityCreatedEvent::dispatch($city);

            return $city;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
