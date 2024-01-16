<?php

namespace App\Containers\AppSection\Header\Events;

use App\Containers\AppSection\Header\Models\Header;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class HeaderUpdatedEvent extends ParentEvent
{
    public function __construct(
        public Header $header
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
