<?php

namespace App\Containers\AppSection\Cart\Models;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends ParentModel
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
    protected string $resourceKey = 'CartItem';

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
