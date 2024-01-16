<?php

namespace App\Containers\AppSection\Customer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CustomerRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
