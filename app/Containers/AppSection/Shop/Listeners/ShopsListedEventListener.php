<?php

namespace App\Containers\AppSection\Shop\Listeners;

use App\Containers\AppSection\Shop\Events\ShopsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShopsListedEvent $event): void
    {
        //
    }
}
