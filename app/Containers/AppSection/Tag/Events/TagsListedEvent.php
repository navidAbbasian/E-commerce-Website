<?php

namespace App\Containers\AppSection\Tag\Events;

use App\Containers\AppSection\Tag\Models\Tag;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TagsListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $tag
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
