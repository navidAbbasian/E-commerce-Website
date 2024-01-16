<?php

namespace App\Containers\AppSection\User\Listeners;

use App\Containers\AppSection\User\Events\UserAddressDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAddressDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserAddressDeletedEvent $event): void
    {
        //
    }
}
