<?php

namespace App\Containers\AppSection\User\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class UserAddressRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
