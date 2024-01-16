<?php

namespace App\Containers\AppSection\Header\Listeners;

use App\Containers\AppSection\Header\Events\HeaderCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class HeaderCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(HeaderCreatedEvent $event): void
    {
        //
    }
}
