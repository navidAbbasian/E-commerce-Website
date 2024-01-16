<?php

namespace App\Containers\AppSection\Product\Listeners;

use App\Containers\AppSection\Product\Events\ProductDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductDeletedEvent $event): void
    {
        //
    }
}
