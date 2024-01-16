<?php

namespace App\Containers\AppSection\Media\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MediaRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
