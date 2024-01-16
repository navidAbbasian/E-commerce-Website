<?php

namespace App\Containers\AppSection\Banner\Listeners;

use App\Containers\AppSection\Banner\Events\BannerFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BannerFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BannerFoundByIdEvent $event): void
    {
        //
    }
}
