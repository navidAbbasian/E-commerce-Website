<?php

namespace App\Containers\AppSection\Banner\Events;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BannerDeletedEvent extends ParentEvent
{
    public function __construct(
        public int $result
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
