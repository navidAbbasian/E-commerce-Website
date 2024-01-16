<?php

namespace App\Containers\AppSection\Slider\Events;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class SliderFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Slider $slider
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
