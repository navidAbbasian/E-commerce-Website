<?php

namespace App\Containers\AppSection\Customer\Listeners;

use App\Containers\AppSection\Customer\Events\CustomerCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CustomerCreatedEvent $event): void
    {
        //
    }
}
