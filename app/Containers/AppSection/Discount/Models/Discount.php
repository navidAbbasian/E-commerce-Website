<?php

namespace App\Containers\AppSection\Discount\Models;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Discount\Enums\DiscountTypeEnum;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'type' => DiscountTypeEnum::class,
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Discount';

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'discount_id', 'id');
    }
}
