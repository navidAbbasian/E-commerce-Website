<?php

namespace App\Containers\AppSection\Product\Listeners;

use App\Containers\AppSection\Product\Events\ProductUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductUpdatedEvent $event): void
    {
        //
    }
}
