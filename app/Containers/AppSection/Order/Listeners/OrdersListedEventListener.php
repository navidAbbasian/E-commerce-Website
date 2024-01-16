<?php

namespace App\Containers\AppSection\Order\Listeners;

use App\Containers\AppSection\Order\Events\OrdersListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdersListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(OrdersListedEvent $event): void
    {
        //
    }
}
