<?php

namespace App\Containers\AppSection\Discount\Listeners;

use App\Containers\AppSection\Discount\Events\DiscountDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiscountDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(DiscountDeletedEvent $event): void
    {
        //
    }
}
