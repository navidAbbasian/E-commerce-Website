<?php

namespace App\Containers\AppSection\Header\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class HeaderRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
