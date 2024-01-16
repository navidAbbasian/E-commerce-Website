<?php

namespace App\Containers\AppSection\Order\Events;

use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class OrderFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Order $order
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
