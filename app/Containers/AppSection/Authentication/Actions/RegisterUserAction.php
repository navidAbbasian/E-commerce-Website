<?php

namespace App\Containers\AppSection\Authentication\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Notifications\Welcome;
use App\Containers\AppSection\Authentication\Tasks\SendVerificationEmailTask;
use App\Containers\AppSection\Authentication\UI\API\Requests\RegisterUserRequest;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\AppSection\VerificationCode\Tasks\CreateVerificationCodeTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class RegisterUserAction extends ParentAction
{
    public function __construct(
        private readonly CreateUserTask $createUserTask,
        private readonly CreateVerificationCodeTask $createVerificationCodeTask,
        private readonly SendVerificationEmailTask $sendVerificationEmailTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(RegisterUserRequest $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'firstname',
            'lastname',
            'mobile',
            'password',
        ]);

        $user = $this->createUserTask->run($sanitizedData);
        $userDetail = [
            'receiver_id' => $user->id,
            'receiver_type' => get_class($user),
            'message' => config('appSection-user.auth-message'),
            'type' => config('appSection-user.register-type'),
            'sent_by' => $user->mobile ? 'sms' : 'email',
        ];
        $this->createVerificationCodeTask->run($userDetail);
        $user->notify(new Welcome());
        $this->sendVerificationEmailTask->run($user, $request->verification_url);

        return $user;
    }
}
