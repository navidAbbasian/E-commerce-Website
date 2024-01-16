<?php

namespace App\Containers\AppSection\Carousel\Listeners;

use App\Containers\AppSection\Carousel\Events\CarouselUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarouselUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CarouselUpdatedEvent $event): void
    {
        //
    }
}
