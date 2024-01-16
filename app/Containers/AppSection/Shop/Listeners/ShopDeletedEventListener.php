<?php

namespace App\Containers\AppSection\Shop\Listeners;

use App\Containers\AppSection\Shop\Events\ShopDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShopDeletedEvent $event): void
    {
        //
    }
}
