<?php

namespace App\Containers\AppSection\Media\Listeners;

use App\Containers\AppSection\Media\Events\MediaUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class MediaUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(MediaUpdatedEvent $event): void
    {
        //
    }
}
