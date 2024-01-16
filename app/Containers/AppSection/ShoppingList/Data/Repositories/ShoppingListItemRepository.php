<?php

namespace App\Containers\AppSection\ShoppingList\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ShoppingListItemRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
