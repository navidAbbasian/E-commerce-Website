<?php

namespace App\Containers\AppSection\User\Listeners;

use App\Containers\AppSection\User\Events\UserAddressFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAddressFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserAddressFoundByIdEvent $event): void
    {
        //
    }
}
