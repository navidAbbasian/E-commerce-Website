<?php

namespace App\Containers\AppSection\Slider\Listeners;

use App\Containers\AppSection\Slider\Events\SliderFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SliderFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SliderFoundByIdEvent $event): void
    {
        //
    }
}
