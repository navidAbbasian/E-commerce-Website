<?php

namespace App\Containers\AppSection\Header\Listeners;

use App\Containers\AppSection\Header\Events\HeaderDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class HeaderDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(HeaderDeletedEvent $event): void
    {
        //
    }
}
