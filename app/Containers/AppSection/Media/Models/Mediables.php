<?php

namespace App\Containers\AppSection\Media\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mediables extends ParentModel
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
    protected string $resourceKey = 'Mediables';

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
}
