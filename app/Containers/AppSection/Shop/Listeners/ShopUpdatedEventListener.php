<?php

namespace App\Containers\AppSection\Shop\Listeners;

use App\Containers\AppSection\Shop\Events\ShopUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShopUpdatedEvent $event): void
    {
        //
    }
}
