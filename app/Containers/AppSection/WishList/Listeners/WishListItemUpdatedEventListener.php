<?php

namespace App\Containers\AppSection\WishList\Listeners;

use App\Containers\AppSection\WishList\Events\WishListItemUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class WishListItemUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(WishListItemUpdatedEvent $event): void
    {
        //
    }
}
