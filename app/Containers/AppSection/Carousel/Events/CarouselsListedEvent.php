<?php

namespace App\Containers\AppSection\Carousel\Events;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CarouselsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $carousel
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
