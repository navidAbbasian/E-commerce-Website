<?php

namespace App\Containers\AppSection\Slider\Listeners;

use App\Containers\AppSection\Slider\Events\SlidersListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SlidersListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SlidersListedEvent $event): void
    {
        //
    }
}
