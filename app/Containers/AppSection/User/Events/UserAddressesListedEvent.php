<?php

namespace App\Containers\AppSection\User\Events;

use App\Containers\AppSection\User\Models\UserAddress;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class UserAddressesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $useraddress
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
