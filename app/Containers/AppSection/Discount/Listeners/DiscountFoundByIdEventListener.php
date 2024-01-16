<?php

namespace App\Containers\AppSection\Discount\Listeners;

use App\Containers\AppSection\Discount\Events\DiscountFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiscountFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(DiscountFoundByIdEvent $event): void
    {
        //
    }
}
