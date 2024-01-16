<?php

namespace App\Containers\AppSection\Discount\Listeners;

use App\Containers\AppSection\Discount\Events\DiscountCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiscountCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(DiscountCreatedEvent $event): void
    {
        //
    }
}
