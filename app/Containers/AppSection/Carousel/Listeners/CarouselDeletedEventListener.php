<?php

namespace App\Containers\AppSection\Carousel\Listeners;

use App\Containers\AppSection\Carousel\Events\CarouselDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarouselDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CarouselDeletedEvent $event): void
    {
        //
    }
}
