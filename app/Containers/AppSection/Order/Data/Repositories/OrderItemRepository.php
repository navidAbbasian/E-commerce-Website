<?php

namespace App\Containers\AppSection\Order\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class OrderItemRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
