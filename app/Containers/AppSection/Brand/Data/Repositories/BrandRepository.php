<?php

namespace App\Containers\AppSection\Brand\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class BrandRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
