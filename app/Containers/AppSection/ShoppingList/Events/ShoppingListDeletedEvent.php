<?php

namespace App\Containers\AppSection\ShoppingList\Events;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ShoppingListDeletedEvent extends ParentEvent
{
    public function __construct(
        public int $result
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
