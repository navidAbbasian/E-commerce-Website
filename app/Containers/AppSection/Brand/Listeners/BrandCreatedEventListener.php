<?php

namespace App\Containers\AppSection\Brand\Listeners;

use App\Containers\AppSection\Brand\Events\BrandCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BrandCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BrandCreatedEvent $event): void
    {
        //
    }
}
