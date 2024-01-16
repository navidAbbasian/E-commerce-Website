<?php

namespace App\Containers\AppSection\Tag\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TagRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
