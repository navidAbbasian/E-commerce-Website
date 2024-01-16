<?php

namespace App\Containers\AppSection\Province\Data\Seeders;

use App\Containers\AppSection\Province\Tasks\CreateCityTask;
use App\Containers\AppSection\Province\Tasks\CreateProvinceTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ProvinceCitySeeder extends ParentSeeder
{
    public function __construct(
        private readonly CreateCityTask $createCityTask,
        private readonly CreateProvinceTask $createProvinceTask
    ) {
    }

    public function run()
    {
        $provinceJson = file_get_contents(__DIR__ . '/../provinces.json');

        $provinceArray = json_decode($provinceJson, true);

        foreach ($provinceArray as $provinceValue) {
            $this->createProvinceTask->run(
                [
                    'name' => $provinceValue['name'],
                ]
            );
        }

        $cityJson = file_get_contents(__DIR__ . '/../cities.json');

        $cityArray = json_decode($cityJson, true);
        sort($cityArray);

        foreach ($cityArray as $cityValue) {
            $this->createCityTask->run(
                [
                    'province_id' => $cityValue['province_id'],
                    'name' => $cityValue['name'],
                ]
            );
        }
    }
}
