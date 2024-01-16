<?php

namespace App\Containers\AppSection\User\Listeners;

use App\Containers\AppSection\User\Events\UserAddressUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAddressUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserAddressUpdatedEvent $event): void
    {
        //
    }
}
