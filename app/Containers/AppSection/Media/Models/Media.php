<?php

namespace App\Containers\AppSection\Media\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Media extends ParentModel
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
    protected string $resourceKey = 'Media';

    public function original(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'original_media_id', 'id');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Media::class, 'original_media_id', 'id');
    }

    public function mediables(): HasMany
    {
        return $this->hasMany(Mediables::class, 'media_id', 'id');
    }
}
