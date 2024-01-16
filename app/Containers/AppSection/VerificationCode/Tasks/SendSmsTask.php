<?php

namespace App\Containers\AppSection\VerificationCode\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class SendSmsTask extends ParentTask
{
    public function __construct()
    {
        // ..
    }

    public function run()
    {
//        dd('sms');
        return 'sms';
    }
}
