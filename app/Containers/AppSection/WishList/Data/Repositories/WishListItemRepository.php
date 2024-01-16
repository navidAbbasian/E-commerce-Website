<?php

namespace App\Containers\AppSection\WishList\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class WishListItemRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
