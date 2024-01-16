<?php

namespace App\Containers\AppSection\Tag\Events;

use App\Containers\AppSection\Tag\Models\Tag;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TagCreatedEvent extends ParentEvent
{
    public function __construct(
        public Tag $tag
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
