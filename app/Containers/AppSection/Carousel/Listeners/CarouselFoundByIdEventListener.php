<?php

namespace App\Containers\AppSection\Carousel\Listeners;

use App\Containers\AppSection\Carousel\Events\CarouselFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarouselFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CarouselFoundByIdEvent $event): void
    {
        //
    }
}
