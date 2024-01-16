<?php

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\Province\Models\City;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends ParentModel
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
    protected string $resourceKey = 'UserAddress';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
