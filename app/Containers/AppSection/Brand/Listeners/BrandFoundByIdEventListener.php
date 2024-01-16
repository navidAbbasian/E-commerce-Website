<?php

namespace App\Containers\AppSection\Brand\Listeners;

use App\Containers\AppSection\Brand\Events\BrandFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BrandFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BrandFoundByIdEvent $event): void
    {
        //
    }
}
