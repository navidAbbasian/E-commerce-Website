<?php

namespace App\Containers\AppSection\Banner\Listeners;

use App\Containers\AppSection\Banner\Events\BannerCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BannerCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BannerCreatedEvent $event): void
    {
        //
    }
}
