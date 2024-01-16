<?php

namespace App\Containers\AppSection\Shop\Listeners;

use App\Containers\AppSection\Shop\Events\ShopCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShopCreatedEvent $event): void
    {
        //
    }
}
