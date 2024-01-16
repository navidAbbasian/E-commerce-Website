<?php

namespace App\Containers\AppSection\Carousel\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CarouselRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
