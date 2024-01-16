<?php

namespace App\Containers\AppSection\Cart\Events;

use App\Containers\AppSection\Cart\Models\CartItem;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CartItemCreatedEvent extends ParentEvent
{
    public function __construct(
        public CartItem $cartitem
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
