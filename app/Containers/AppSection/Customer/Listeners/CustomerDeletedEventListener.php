<?php

namespace App\Containers\AppSection\Customer\Listeners;

use App\Containers\AppSection\Customer\Events\CustomerDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CustomerDeletedEvent $event): void
    {
        //
    }
}
