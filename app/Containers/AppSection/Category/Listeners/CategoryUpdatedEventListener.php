<?php

namespace App\Containers\AppSection\Category\Listeners;

use App\Containers\AppSection\Category\Events\CategoryUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CategoryUpdatedEvent $event): void
    {
        //
    }
}
