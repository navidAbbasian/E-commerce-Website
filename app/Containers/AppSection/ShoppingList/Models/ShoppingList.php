<?php

namespace App\Containers\AppSection\ShoppingList\Models;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingList extends ParentModel
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
    protected string $resourceKey = 'ShoppingList';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(ShoppingListItem::class, 'shopping_list_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
