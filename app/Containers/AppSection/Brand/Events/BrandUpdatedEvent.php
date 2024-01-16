<?php

namespace App\Containers\AppSection\Brand\Events;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class BrandUpdatedEvent extends ParentEvent
{
    public function __construct(
        public Brand $brand
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
