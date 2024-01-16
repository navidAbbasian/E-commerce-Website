<?php

namespace App\Containers\AppSection\Province\Events;

use App\Containers\AppSection\Province\Models\City;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CitiesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $city
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
