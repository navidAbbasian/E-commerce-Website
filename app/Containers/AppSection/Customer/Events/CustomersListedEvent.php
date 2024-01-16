<?php

namespace App\Containers\AppSection\Customer\Events;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CustomersListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $customer
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
