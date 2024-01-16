<?php

namespace App\Containers\AppSection\Slider\Listeners;

use App\Containers\AppSection\Slider\Events\SliderUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SliderUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SliderUpdatedEvent $event): void
    {
        //
    }
}
