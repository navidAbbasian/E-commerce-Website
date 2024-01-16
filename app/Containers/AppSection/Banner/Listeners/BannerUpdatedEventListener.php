<?php

namespace App\Containers\AppSection\Banner\Listeners;

use App\Containers\AppSection\Banner\Events\BannerUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BannerUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BannerUpdatedEvent $event): void
    {
        //
    }
}
