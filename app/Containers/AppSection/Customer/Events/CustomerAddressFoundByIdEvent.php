<?php

namespace App\Containers\AppSection\Customer\Events;

use App\Containers\AppSection\Customer\Models\CustomerAddress;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CustomerAddressFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public CustomerAddress $customeraddress
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
