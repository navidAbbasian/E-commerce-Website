<?php

namespace App\Containers\AppSection\Brand\Listeners;

use App\Containers\AppSection\Brand\Events\BrandDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BrandDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BrandDeletedEvent $event): void
    {
        //
    }
}
