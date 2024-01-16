<?php

namespace App\Containers\AppSection\Category\Listeners;

use App\Containers\AppSection\Category\Events\CategoryDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CategoryDeletedEvent $event): void
    {
        //
    }
}
