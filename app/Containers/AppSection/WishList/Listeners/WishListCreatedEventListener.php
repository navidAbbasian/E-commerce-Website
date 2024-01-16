<?php

namespace App\Containers\AppSection\WishList\Listeners;

use App\Containers\AppSection\WishList\Events\WishListCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class WishListCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(WishListCreatedEvent $event): void
    {
        //
    }
}
