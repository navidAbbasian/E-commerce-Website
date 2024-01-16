<?php

namespace App\Containers\AppSection\Product\Listeners;

use App\Containers\AppSection\Product\Events\ProductFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductFoundByIdEvent $event): void
    {
        //
    }
}
