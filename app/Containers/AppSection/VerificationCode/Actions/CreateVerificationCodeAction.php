<?php

namespace App\Containers\AppSection\VerificationCode\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\VerificationCode\Models\VerificationCode;

use App\Containers\AppSection\VerificationCode\Tasks\CreateVerificationCodeTask;
use App\Containers\AppSection\VerificationCode\UI\API\Requests\CreateVerificationCodeRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateVerificationCodeAction extends ParentAction
{
    /**
     * @param CreateVerificationCodeRequest $request
     * @return VerificationCode
     * @throws IncorrectIdException
     */
    public function run(CreateVerificationCodeRequest $request): VerificationCode
    {

        $data = $request->sanitizeInput([
            // add your request data here
            'receiver_id',
            'receiver_type',
            'code',
            'expires_in',
            'message',
            'type',
            'sent_by',
//            'is_used',
        ]);

        return app(CreateVerificationCodeTask::class)->run($data);

    }
}
