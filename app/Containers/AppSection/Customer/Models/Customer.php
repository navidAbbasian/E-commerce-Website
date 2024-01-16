<?php

namespace App\Containers\AppSection\Customer\Models;

use App\Containers\AppSection\Customer\Enums\CustomerGenderEnum;
use App\Containers\AppSection\Customer\Enums\CustomerStatusEnum;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\Rules\Password;

class Customer extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'gender' => CustomerGenderEnum::class,
        'status' => CustomerStatusEnum::class,
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Customer';

    public static function getPasswordValidationRules(): Password
    {
        return Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(CustomerAddress::class, 'customer_id', 'id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(FavoriteItem::class, 'customer_id', 'id');
    }

    public function discounts(): HasMany
    {
        return $this->hasMany(Customer::class, 'customer_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}
