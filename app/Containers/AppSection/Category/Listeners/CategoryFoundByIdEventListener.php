<?php

namespace App\Containers\AppSection\Category\Listeners;

use App\Containers\AppSection\Category\Events\CategoryFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CategoryFoundByIdEvent $event): void
    {
        //
    }
}
