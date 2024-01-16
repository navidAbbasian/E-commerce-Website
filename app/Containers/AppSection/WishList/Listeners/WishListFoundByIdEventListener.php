<?php

namespace App\Containers\AppSection\WishList\Listeners;

use App\Containers\AppSection\WishList\Events\WishListFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class WishListFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(WishListFoundByIdEvent $event): void
    {
        //
    }
}
