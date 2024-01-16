<?php

namespace App\Containers\AppSection\Carousel\Listeners;

use App\Containers\AppSection\Carousel\Events\CarouselsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarouselsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CarouselsListedEvent $event): void
    {
        //
    }
}
