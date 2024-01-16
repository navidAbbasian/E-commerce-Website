<?php

namespace App\Containers\AppSection\Cart\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CartRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
