<?php

namespace App\Containers\AppSection\WishList\Models;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WishListItem extends ParentModel
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
    protected string $resourceKey = 'WishListItem';

    public function wishlist(): BelongsTo
    {
        return $this->belongsTo(WishList::class, 'wish_list_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
