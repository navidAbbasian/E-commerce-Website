<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Province\Data\Repositories\CityRepository;
// use App\Containers\AppSection\Shop\Events\DomainDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RevokeTransferAmountFromShopTask extends ParentTask
{
    public function __construct(
        protected CityRepository $cityRepository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id)
    {
        try {

            $city = $this->cityRepository->find($id);
            $city->shopTransferAmounts()->detach();

            return $city;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
