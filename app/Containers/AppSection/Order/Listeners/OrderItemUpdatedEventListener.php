<?php

namespace App\Containers\AppSection\Order\Listeners;

use App\Containers\AppSection\Order\Events\OrderItemUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderItemUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(OrderItemUpdatedEvent $event): void
    {
        //
    }
}
