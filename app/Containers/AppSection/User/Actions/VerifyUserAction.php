<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Exceptions\VerificationCodeExpiredException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Containers\AppSection\User\UI\API\Requests\VerifyUserRequest;
use App\Containers\AppSection\VerificationCode\Tasks\CheckCodeTask;
use App\Ship\Parents\Actions\Action as ParentAction;

class VerifyUserAction extends ParentAction
{
    public function __construct(
        private readonly FindUserByEmailTask $findUserByEmailTask,
        private readonly CheckCodeTask $checkCodeTask,
    ) {
    }

    public function run(VerifyUserRequest $request): User
    {
        $data = $request->sanitizeInput([
            'email',
//            'mobile',
            'code',
        ]);
        $user = $this->findUserByEmailTask->run($data['email']);

        $receiverId = $user->id;
        $receiverType = get_class($user);
        $code = $data['code'];

        $verify = $this->checkCodeTask->run($receiverId, $receiverType, $code);
        if ($verify) {
            return $user;
        } else {
            throw new VerificationCodeExpiredException();
        }
    }
}
