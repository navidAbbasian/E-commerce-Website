<?php

namespace App\Containers\AppSection\Comment\Models;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentLike extends ParentModel
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
    protected string $resourceKey = 'CommentLike';

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
