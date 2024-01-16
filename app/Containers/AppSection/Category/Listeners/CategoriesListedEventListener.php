<?php

namespace App\Containers\AppSection\Category\Listeners;

use App\Containers\AppSection\Category\Events\CategoriesListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoriesListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CategoriesListedEvent $event): void
    {
        //
    }
}
