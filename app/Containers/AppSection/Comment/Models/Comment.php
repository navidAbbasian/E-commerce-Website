<?php

namespace App\Containers\AppSection\Comment\Models;

use App\Containers\AppSection\Comment\Enums\CommentStatusEnum;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends ParentModel
{
    protected $guarded = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'status' => CommentStatusEnum::class,
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Comment';

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }

    public function goodPoints(): HasMany
    {
        return $this->hasMany(CommentGoodPoint::class, 'comment_id', 'id');
    }

    public function badPoints(): HasMany
    {
        return $this->hasMany(CommentBadPoint::class, 'comment_id', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(CommentLike::class, 'comment_id', 'id');
    }
}
