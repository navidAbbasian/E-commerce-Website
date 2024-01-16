<?php

namespace App\Containers\AppSection\Tax\Events;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TaxesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $tax
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
