<?php

namespace App\Containers\AppSection\ShoppingList\Models;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShoppingListItem extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ShoppingListItem';

    public function shoppingList(): BelongsTo
    {
        return $this->belongsTo(ShoppingList::class, 'shopping_list_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
