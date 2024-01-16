<?php

namespace App\Containers\AppSection\Footer\Listeners;

use App\Containers\AppSection\Footer\Events\FooterFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FooterFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FooterFoundByIdEvent $event): void
    {
        //
    }
}
