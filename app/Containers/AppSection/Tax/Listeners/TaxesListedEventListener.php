<?php

namespace App\Containers\AppSection\Tax\Listeners;

use App\Containers\AppSection\Tax\Events\TaxesListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaxesListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TaxesListedEvent $event): void
    {
        //
    }
}
