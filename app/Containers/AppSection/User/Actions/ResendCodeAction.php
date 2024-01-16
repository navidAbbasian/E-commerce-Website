<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Containers\AppSection\User\UI\API\Requests\ResendCodeRequest;
use App\Containers\AppSection\VerificationCode\Tasks\CreateVerificationCodeTask;
use App\Ship\Parents\Actions\Action as ParentAction;

class ResendCodeAction extends ParentAction
{
    public function __construct(
        private readonly FindUserByEmailTask $findUserByEmailTask,
        private readonly CreateVerificationCodeTask $createVerificationCodeTask,
    ) {
    }

    public function run(ResendCodeRequest $request)
    {
        $data = $request->sanitizeInput([
            'email',
//            'mobile',
        ]);

        $user = $this->findUserByEmailTask->run($data['email']);
        $userDetail = [
            'receiver_id' => $user->id,
            'receiver_type' => get_class($user),
            'message' => config('appSection-user.auth-message'),
            'type' => config('appSection-user.verification-type.register'),
            'sent_by' => $user->mobile ? 'sms' : 'email',
        ];
        $this->createVerificationCodeTask->run($userDetail);
        return $user;
    }
}
