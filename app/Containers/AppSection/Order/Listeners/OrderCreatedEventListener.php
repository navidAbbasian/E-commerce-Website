<?php

namespace App\Containers\AppSection\Order\Listeners;

use App\Containers\AppSection\Order\Events\OrderCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(OrderCreatedEvent $event): void
    {
        //
    }
}
