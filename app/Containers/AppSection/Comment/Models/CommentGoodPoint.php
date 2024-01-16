<?php

namespace App\Containers\AppSection\Comment\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentGoodPoint extends ParentModel
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
    protected string $resourceKey = 'CommentGoodPoint';

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
}
