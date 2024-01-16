<?php

namespace App\Containers\AppSection\Footer\Listeners;

use App\Containers\AppSection\Footer\Events\FooterCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FooterCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FooterCreatedEvent $event): void
    {
        //
    }
}
