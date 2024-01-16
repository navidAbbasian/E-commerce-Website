<?php

namespace App\Containers\AppSection\Product\Listeners;

use App\Containers\AppSection\Product\Events\ProductCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductCreatedEvent $event): void
    {
        //
    }
}
