<?php

namespace App\Containers\AppSection\Discount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class DiscountRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
