<?php

namespace App\Containers\AppSection\Order\Models;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends ParentModel
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
    protected string $resourceKey = 'Order';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

}
