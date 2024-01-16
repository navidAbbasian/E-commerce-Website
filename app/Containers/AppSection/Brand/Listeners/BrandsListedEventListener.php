<?php

namespace App\Containers\AppSection\Brand\Listeners;

use App\Containers\AppSection\Brand\Events\BrandsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BrandsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BrandsListedEvent $event): void
    {
        //
    }
}
