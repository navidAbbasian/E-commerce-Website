<?php

namespace App\Containers\AppSection\Shop\Listeners;

use App\Containers\AppSection\Shop\Events\ShopFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShopFoundByIdEvent $event): void
    {
        //
    }
}
