<?php

namespace App\Containers\AppSection\Discount\Listeners;

use App\Containers\AppSection\Discount\Events\DiscountUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiscountUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(DiscountUpdatedEvent $event): void
    {
        //
    }
}
