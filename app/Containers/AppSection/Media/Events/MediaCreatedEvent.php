<?php

namespace App\Containers\AppSection\Media\Events;

use App\Containers\AppSection\Media\Models\Media;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class MediaCreatedEvent extends ParentEvent
{
    public function __construct(
        public Media $media
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
