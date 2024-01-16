<?php

namespace App\Containers\AppSection\Comment\Listeners;

use App\Containers\AppSection\Comment\Events\CommentCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CommentCreatedEvent $event): void
    {
        //
    }
}
