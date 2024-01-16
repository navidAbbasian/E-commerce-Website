<?php

namespace App\Containers\AppSection\User\Listeners;

use App\Containers\AppSection\User\Events\UserAddressCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAddressCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserAddressCreatedEvent $event): void
    {
        //
    }
}
