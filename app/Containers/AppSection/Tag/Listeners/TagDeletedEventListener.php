<?php

namespace App\Containers\AppSection\Tag\Listeners;

use App\Containers\AppSection\Tag\Events\TagDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TagDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TagDeletedEvent $event): void
    {
        //
    }
}
