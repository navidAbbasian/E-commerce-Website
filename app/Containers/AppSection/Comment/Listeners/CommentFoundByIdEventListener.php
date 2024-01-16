<?php

namespace App\Containers\AppSection\Comment\Listeners;

use App\Containers\AppSection\Comment\Events\CommentFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CommentFoundByIdEvent $event): void
    {
        //
    }
}
