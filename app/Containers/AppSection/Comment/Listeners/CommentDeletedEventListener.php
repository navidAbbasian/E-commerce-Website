<?php

namespace App\Containers\AppSection\Comment\Listeners;

use App\Containers\AppSection\Comment\Events\CommentDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CommentDeletedEvent $event): void
    {
        //
    }
}
