<?php

namespace App\Containers\AppSection\Media\Listeners;

use App\Containers\AppSection\Media\Events\MediaListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class MediaListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(MediaListedEvent $event): void
    {
        //
    }
}
