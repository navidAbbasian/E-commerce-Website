<?php

namespace App\Containers\AppSection\WishList\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class WishListRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
