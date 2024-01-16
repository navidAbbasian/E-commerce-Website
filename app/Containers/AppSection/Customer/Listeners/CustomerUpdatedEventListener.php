<?php

namespace App\Containers\AppSection\Customer\Listeners;

use App\Containers\AppSection\Customer\Events\CustomerUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CustomerUpdatedEvent $event): void
    {
        //
    }
}
