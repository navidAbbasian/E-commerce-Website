<?php

namespace App\Containers\AppSection\Customer\Events;

use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CustomerAddressesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $customeraddress
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
