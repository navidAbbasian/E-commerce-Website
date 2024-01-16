<?php

namespace App\Containers\AppSection\Tax\Listeners;

use App\Containers\AppSection\Tax\Events\TaxCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaxCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TaxCreatedEvent $event): void
    {
        //
    }
}
