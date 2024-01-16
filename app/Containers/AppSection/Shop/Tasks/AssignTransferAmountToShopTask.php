<?php

namespace App\Containers\AppSection\Shop\Tasks;

use App\Containers\AppSection\Province\Data\Repositories\CityRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class AssignTransferAmountToShopTask extends ParentTask
{
    public function __construct(
        protected CityRepository $cityRepository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data)
    {
        try {
            $city = $this->cityRepository->find($data['city_id']);
            $city->shopTransferAmounts()->attach($data['province_id'], ['shop_id' => $data['shop_id'], 'amount' => $data['amount']]);

            return $data;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
