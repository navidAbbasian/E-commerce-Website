<?php

namespace App\Containers\AppSection\Media\Listeners;

use App\Containers\AppSection\Media\Events\MediaDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class MediaDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(MediaDeletedEvent $event): void
    {
        //
    }
}
