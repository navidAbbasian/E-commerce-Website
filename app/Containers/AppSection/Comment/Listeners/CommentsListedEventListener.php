<?php

namespace App\Containers\AppSection\Comment\Listeners;

use App\Containers\AppSection\Comment\Events\CommentsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CommentsListedEvent $event): void
    {
        //
    }
}
