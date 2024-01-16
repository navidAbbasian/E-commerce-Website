<?php

namespace App\Containers\AppSection\Media\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MediablesRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
