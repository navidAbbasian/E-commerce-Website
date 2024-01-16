<?php

namespace App\Containers\AppSection\Carousel\Models;

use App\Containers\AppSection\Carousel\Enums\CarouselTypeEnum;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carousel extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'type' => CarouselTypeEnum::class,
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Carousel';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
