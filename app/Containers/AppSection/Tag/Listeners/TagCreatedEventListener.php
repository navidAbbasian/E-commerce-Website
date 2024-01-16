<?php

namespace App\Containers\AppSection\Tag\Listeners;

use App\Containers\AppSection\Tag\Events\TagCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TagCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TagCreatedEvent $event): void
    {
        //
    }
}
