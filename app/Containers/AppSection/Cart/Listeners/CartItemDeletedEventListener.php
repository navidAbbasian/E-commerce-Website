<?php

namespace App\Containers\AppSection\Cart\Listeners;

use App\Containers\AppSection\Cart\Events\CartItemDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartItemDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CartItemDeletedEvent $event): void
    {
        //
    }
}
