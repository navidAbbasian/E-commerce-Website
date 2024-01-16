<?php

namespace App\Containers\AppSection\Discount\Listeners;

use App\Containers\AppSection\Discount\Events\DiscountsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiscountsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(DiscountsListedEvent $event): void
    {
        //
    }
}
