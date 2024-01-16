<?php

namespace App\Containers\AppSection\Slider\Listeners;

use App\Containers\AppSection\Slider\Events\SliderDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SliderDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SliderDeletedEvent $event): void
    {
        //
    }
}
