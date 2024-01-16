<?php

namespace App\Containers\AppSection\Product\Events;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ProductDeletedEvent extends ParentEvent
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
