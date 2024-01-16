<?php

namespace App\Containers\AppSection\Media\Listeners;

use App\Containers\AppSection\Media\Events\MediaFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class MediaFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(MediaFoundByIdEvent $event): void
    {
        //
    }
}
