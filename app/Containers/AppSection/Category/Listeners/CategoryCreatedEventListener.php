<?php

namespace App\Containers\AppSection\Category\Listeners;

use App\Containers\AppSection\Category\Events\CategoryCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CategoryCreatedEvent $event): void
    {
        //
    }
}
