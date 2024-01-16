<?php

namespace App\Containers\AppSection\Banner\Events;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BannerUpdatedEvent extends ParentEvent
{
    public function __construct(
        public Banner $banner
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
