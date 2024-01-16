<?php

namespace App\Containers\AppSection\Tax\Listeners;

use App\Containers\AppSection\Tax\Events\TaxUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaxUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TaxUpdatedEvent $event): void
    {
        //
    }
}
