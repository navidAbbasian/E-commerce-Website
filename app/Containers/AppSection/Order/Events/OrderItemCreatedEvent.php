<?php

namespace App\Containers\AppSection\Order\Events;

use App\Containers\AppSection\Order\Models\OrderItem;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class OrderItemCreatedEvent extends ParentEvent
{
    public function __construct(
        public OrderItem $orderitem
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
