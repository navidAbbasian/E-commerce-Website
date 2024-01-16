<?php

namespace App\Containers\AppSection\VerificationCode\Tasks;

use App\Containers\AppSection\VerificationCode\Data\Repositories\VerificationCodeRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;

class CheckCodeTask extends ParentTask
{
    public function __construct(
        protected VerificationCodeRepository $verificationCodeRepository
    ) {
    }

    public function run($request)
    {
        $receiverId = $request->receiver_id;
        $receiverType = $request->receiver_type;
        $code = $request->code;
        $type = $request->type;

        $verificationCode = $this->verificationCodeRepository->where('receiver_id', $receiverId)->where('receiver_type', $receiverType)
            ->where('expires_in', '>=', Carbon::now())
            ->where('code', $code)
            ->where('is_used', 0)
            ->where('type', $type)
            ->latest()->first();

        if ($verificationCode) {
            $verificationCode['is_used'] = 1;
            $verificationCode->save();

            return true;
        } else {
            return false;
        }
    }
}
