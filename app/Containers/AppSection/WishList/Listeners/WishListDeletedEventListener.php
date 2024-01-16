<?php

namespace App\Containers\AppSection\WishList\Listeners;

use App\Containers\AppSection\WishList\Events\WishListDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class WishListDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(WishListDeletedEvent $event): void
    {
        //
    }
}
