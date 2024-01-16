<?php

namespace App\Containers\AppSection\Product\Listeners;

use App\Containers\AppSection\Product\Events\ProductsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductsListedEvent $event): void
    {
        //
    }
}
