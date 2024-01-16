<?php

namespace App\Containers\AppSection\Category\Events;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CategoriesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $category
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
