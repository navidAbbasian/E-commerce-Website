<?php

namespace App\Containers\AppSection\Cart\Listeners;

use App\Containers\AppSection\Cart\Events\CartDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CartDeletedEvent $event): void
    {
        //
    }
}
