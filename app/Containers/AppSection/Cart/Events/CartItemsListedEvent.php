<?php

namespace App\Containers\AppSection\Cart\Events;

use App\Containers\AppSection\Cart\Models\CartItem;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CartItemsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $cartitem
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
