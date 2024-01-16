<?php

namespace App\Containers\AppSection\Footer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FooterRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
