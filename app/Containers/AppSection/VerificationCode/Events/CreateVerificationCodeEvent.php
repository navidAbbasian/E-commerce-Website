<?php

namespace App\Containers\AppSection\VerificationCode\Events;

use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\Tasks\SendEmailTask;
use App\Containers\AppSection\VerificationCode\Tasks\SendSmsTask;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CreateVerificationCodeEvent extends ParentEvent
{
    public function __construct(
        public VerificationCode $verificationcode
    ) {
        if ('email' == $this->verificationcode['sent_by']) {
            app(SendEmailTask::class)->run();
        }
        if ('sms' == $this->verificationcode['sent_by']) {
            app(SendSmsTask::class)->run();
        }
    }

    public function broadcastOn(): Channel|array
    {
        app(SendEmailTask::class)->run();

        return new PrivateChannel('channel-name');
    }
}
