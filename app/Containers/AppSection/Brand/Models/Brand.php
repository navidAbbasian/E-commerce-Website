<?php

namespace App\Containers\AppSection\Brand\Models;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends ParentModel
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
    protected string $resourceKey = 'Brand';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
