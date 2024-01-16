<?php

namespace App\Containers\AppSection\Comment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CommentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
