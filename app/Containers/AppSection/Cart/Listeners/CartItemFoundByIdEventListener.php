<?php

namespace App\Containers\AppSection\Cart\Listeners;

use App\Containers\AppSection\Cart\Events\CartItemFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartItemFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CartItemFoundByIdEvent $event): void
    {
        //
    }
}
