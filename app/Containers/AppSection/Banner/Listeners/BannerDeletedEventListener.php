<?php

namespace App\Containers\AppSection\Banner\Listeners;

use App\Containers\AppSection\Banner\Events\BannerDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BannerDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BannerDeletedEvent $event): void
    {
        //
    }
}
