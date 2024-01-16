<?php

namespace App\Containers\AppSection\Comment\Events;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CommentUpdatedEvent extends ParentEvent
{
    public function __construct(
        public Comment $comment
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
