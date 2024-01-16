<?php

namespace App\Containers\AppSection\Footer\Listeners;

use App\Containers\AppSection\Footer\Events\FooterUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FooterUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FooterUpdatedEvent $event): void
    {
        //
    }
}
