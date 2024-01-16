<?php

namespace App\Containers\AppSection\Banner\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class BannerRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
