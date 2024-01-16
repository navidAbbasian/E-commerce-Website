<?php

namespace App\Containers\AppSection\Product\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductAttribute extends ParentModel
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
    protected string $resourceKey = 'ProductAttribute';

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
