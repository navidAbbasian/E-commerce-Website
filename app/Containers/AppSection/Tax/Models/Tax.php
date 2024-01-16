<?php

namespace App\Containers\AppSection\Tax\Models;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tax extends ParentModel
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
    protected string $resourceKey = 'Tax';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_tax', 'tax_id', 'product_id');
    }
}
