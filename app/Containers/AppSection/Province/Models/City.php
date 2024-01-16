<?php

namespace App\Containers\AppSection\Province\Models;

use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends ParentModel
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
    protected string $resourceKey = 'City';

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function customerAddresses(): HasMany
    {
        return $this->hasMany(CustomerAddress::class, 'city_id', 'id');
    }

    public function userAddresses(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'city_id', 'id');
    }

    public function shopTransferAmounts(): BelongsToMany
    {
        return $this->belongsToMany(Province::class, 'shop_transfer_amounts', 'city_id', 'province_id')
            ->withPivot('amount', 'shop_id');
    }
}
