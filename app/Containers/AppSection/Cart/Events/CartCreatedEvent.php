<?php

namespace App\Containers\AppSection\Cart\Events;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CartCreatedEvent extends ParentEvent
{
    public function __construct(
        public Cart $cart
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
