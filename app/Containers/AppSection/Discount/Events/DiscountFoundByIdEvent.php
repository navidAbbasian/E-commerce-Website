<?php

namespace App\Containers\AppSection\Discount\Events;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class DiscountFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Discount $discount
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
