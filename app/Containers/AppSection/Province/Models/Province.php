<?php

namespace App\Containers\AppSection\Province\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends ParentModel
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
    protected string $resourceKey = 'Province';

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }

    public function shopTransferAmounts(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'shop_transfer_amounts', 'province_id', 'city_id');
    }
}
