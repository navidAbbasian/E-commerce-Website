<?php

namespace App\Containers\AppSection\User\Listeners;

use App\Containers\AppSection\User\Events\UserAddressesListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAddressesListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserAddressesListedEvent $event): void
    {
        //
    }
}
