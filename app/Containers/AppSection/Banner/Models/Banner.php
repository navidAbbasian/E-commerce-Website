<?php

namespace App\Containers\AppSection\Banner\Models;

use App\Containers\AppSection\Banner\Enums\BannerColumnEnum;
use App\Containers\AppSection\Banner\Enums\BannerPageEnum;
use App\Containers\AppSection\Banner\Enums\BannerPositionEnum;
use App\Containers\AppSection\Banner\Enums\BannerSituationEnum;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'column' => BannerColumnEnum::class,
        'page' => BannerPageEnum::class,
        'situation' => BannerSituationEnum::class,
        'position' => BannerPositionEnum::class,
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Banner';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
