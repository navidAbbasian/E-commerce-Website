<?php

namespace App\Containers\AppSection\Customer\Events;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CustomerFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Customer $customer
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
