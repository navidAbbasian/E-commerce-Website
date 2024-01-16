<?php

namespace App\Containers\AppSection\Carousel\Listeners;

use App\Containers\AppSection\Carousel\Events\CarouselCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarouselCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CarouselCreatedEvent $event): void
    {
        //
    }
}
