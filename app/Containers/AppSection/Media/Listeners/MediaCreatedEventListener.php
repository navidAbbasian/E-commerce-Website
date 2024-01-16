<?php

namespace App\Containers\AppSection\Media\Listeners;

use App\Containers\AppSection\Media\Events\MediaCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class MediaCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(MediaCreatedEvent $event): void
    {
        //
    }
}
