<?php

namespace App\Containers\AppSection\Footer\Events;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class FootersListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $footer
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
