<?php

namespace App\Containers\AppSection\Slider\Listeners;

use App\Containers\AppSection\Slider\Events\SliderCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SliderCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SliderCreatedEvent $event): void
    {
        //
    }
}
