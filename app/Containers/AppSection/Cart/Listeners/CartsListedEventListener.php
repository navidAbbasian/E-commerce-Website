<?php

namespace App\Containers\AppSection\Cart\Listeners;

use App\Containers\AppSection\Cart\Events\CartsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CartsListedEvent $event): void
    {
        //
    }
}
