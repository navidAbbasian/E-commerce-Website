<?php

namespace App\Containers\AppSection\VerificationCode\Actions;

use App\Containers\AppSection\VerificationCode\Tasks\CheckCodeTask;
use App\Ship\Parents\Actions\Action as ParentAction;

class CheckCodeAction extends ParentAction
{
    public function run($request)
    {
        return app(CheckCodeTask::class)->run($request);
    }
}
