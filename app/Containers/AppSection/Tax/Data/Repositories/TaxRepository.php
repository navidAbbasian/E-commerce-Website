<?php

namespace App\Containers\AppSection\Tax\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TaxRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
