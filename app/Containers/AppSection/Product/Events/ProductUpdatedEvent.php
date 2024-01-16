<?php

namespace App\Containers\AppSection\Product\Events;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class ProductUpdatedEvent extends ParentEvent
{
    public function __construct(
        public Product $product
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
