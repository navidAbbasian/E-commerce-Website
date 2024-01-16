<?php

namespace App\Containers\AppSection\Shop\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class DomainRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
