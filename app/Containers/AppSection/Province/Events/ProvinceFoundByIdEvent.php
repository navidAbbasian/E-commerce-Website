<?php

namespace App\Containers\AppSection\Province\Events;

use App\Containers\AppSection\Province\Models\Province;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ProvinceFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Province $province
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
