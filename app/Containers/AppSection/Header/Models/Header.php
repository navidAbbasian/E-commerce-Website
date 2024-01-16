<?php

namespace App\Containers\AppSection\Header\Models;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Header extends ParentModel
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
    protected string $resourceKey = 'Header';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
