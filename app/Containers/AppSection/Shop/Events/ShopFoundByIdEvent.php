<?php

namespace App\Containers\AppSection\Shop\Events;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ShopFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Shop $shop
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
