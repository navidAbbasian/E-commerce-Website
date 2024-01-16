<?php

namespace App\Containers\AppSection\Tag\Listeners;

use App\Containers\AppSection\Tag\Events\TagFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TagFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TagFoundByIdEvent $event): void
    {
        //
    }
}
