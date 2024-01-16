<?php

namespace App\Containers\AppSection\Footer\Listeners;

use App\Containers\AppSection\Footer\Events\FootersListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FootersListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FootersListedEvent $event): void
    {
        //
    }
}
