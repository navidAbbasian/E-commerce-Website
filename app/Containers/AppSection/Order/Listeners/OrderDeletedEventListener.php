<?php

namespace App\Containers\AppSection\Order\Listeners;

use App\Containers\AppSection\Order\Events\OrderDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(OrderDeletedEvent $event): void
    {
        //
    }
}
