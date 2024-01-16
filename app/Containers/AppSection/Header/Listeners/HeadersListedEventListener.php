<?php

namespace App\Containers\AppSection\Header\Listeners;

use App\Containers\AppSection\Header\Events\HeadersListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class HeadersListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(HeadersListedEvent $event): void
    {
        //
    }
}
