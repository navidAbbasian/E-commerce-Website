<?php

namespace App\Containers\AppSection\Customer\Listeners;

use App\Containers\AppSection\Customer\Events\CustomerAddressDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerAddressDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CustomerAddressDeletedEvent $event): void
    {
        //
    }
}
