<?php

namespace App\Containers\AppSection\WishList\Listeners;

use App\Containers\AppSection\WishList\Events\WishListItemFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class WishListItemFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(WishListItemFoundByIdEvent $event): void
    {
        //
    }
}
