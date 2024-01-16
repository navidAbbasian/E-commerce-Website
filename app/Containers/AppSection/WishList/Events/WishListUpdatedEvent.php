<?php

namespace App\Containers\AppSection\WishList\Events;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class WishListUpdatedEvent extends ParentEvent
{
    public function __construct(
        public WishList $wishlist
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
