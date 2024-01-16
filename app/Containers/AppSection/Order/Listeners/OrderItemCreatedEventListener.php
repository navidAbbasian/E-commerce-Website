<?php

namespace App\Containers\AppSection\Order\Listeners;

use App\Containers\AppSection\Order\Events\OrderItemCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderItemCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(OrderItemCreatedEvent $event): void
    {
        //
    }
}
