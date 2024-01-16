<?php

namespace App\Containers\AppSection\WishList\Events;

use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class WishListItemUpdatedEvent extends ParentEvent
{
    public function __construct(
        public WishListItem $wishlistitem
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
