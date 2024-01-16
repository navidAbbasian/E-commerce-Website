<?php

namespace App\Containers\AppSection\Cart\Listeners;

use App\Containers\AppSection\Cart\Events\CartCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CartCreatedEvent $event): void
    {
        //
    }
}
