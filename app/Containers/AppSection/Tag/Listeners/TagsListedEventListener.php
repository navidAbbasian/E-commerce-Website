<?php

namespace App\Containers\AppSection\Tag\Listeners;

use App\Containers\AppSection\Tag\Events\TagsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TagsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TagsListedEvent $event): void
    {
        //
    }
}
