<?php

namespace App\Containers\AppSection\Footer\Models;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Footer extends ParentModel
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
    protected string $resourceKey = 'Footer';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Footer::class, 'parent_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Footer::class, 'parent_id', 'id');
    }
}
