<?php

namespace App\Containers\AppSection\Customer\Listeners;

use App\Containers\AppSection\Customer\Events\CustomerAddressFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerAddressFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CustomerAddressFoundByIdEvent $event): void
    {
        //
    }
}
