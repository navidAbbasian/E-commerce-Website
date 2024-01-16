<?php

namespace App\Containers\AppSection\Footer\Listeners;

use App\Containers\AppSection\Footer\Events\FooterDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FooterDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FooterDeletedEvent $event): void
    {
        //
    }
}
