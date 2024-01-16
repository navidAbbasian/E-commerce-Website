<?php

namespace App\Containers\AppSection\Tag\Listeners;

use App\Containers\AppSection\Tag\Events\TagUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TagUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TagUpdatedEvent $event): void
    {
        //
    }
}
