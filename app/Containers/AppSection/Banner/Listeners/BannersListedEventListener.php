<?php

namespace App\Containers\AppSection\Banner\Listeners;

use App\Containers\AppSection\Banner\Events\BannersListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BannersListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BannersListedEvent $event): void
    {
        //
    }
}
