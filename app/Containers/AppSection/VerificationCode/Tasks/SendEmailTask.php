<?php

namespace App\Containers\AppSection\VerificationCode\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class SendEmailTask extends ParentTask
{
    public function __construct()
    {
    }

    public function run()
    {
//        dd('email');
        return 'email';
    }
}
