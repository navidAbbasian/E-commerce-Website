<?php

namespace App\Containers\AppSection\Header\Listeners;

use App\Containers\AppSection\Header\Events\HeaderUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class HeaderUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(HeaderUpdatedEvent $event): void
    {
        //
    }
}
