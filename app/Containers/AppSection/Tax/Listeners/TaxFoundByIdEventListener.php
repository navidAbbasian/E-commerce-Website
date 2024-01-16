<?php

namespace App\Containers\AppSection\Tax\Listeners;

use App\Containers\AppSection\Tax\Events\TaxFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaxFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TaxFoundByIdEvent $event): void
    {
        //
    }
}
