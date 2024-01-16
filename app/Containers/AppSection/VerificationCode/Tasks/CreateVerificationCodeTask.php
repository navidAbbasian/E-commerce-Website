<?php

namespace App\Containers\AppSection\VerificationCode\Tasks;

use App\Containers\AppSection\VerificationCode\Data\Repositories\VerificationCodeRepository;
use App\Containers\AppSection\VerificationCode\Events\CreateVerificationCodeEvent;
use App\Containers\AppSection\VerificationCode\Exceptions\SendVerificationCodeException;
use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateVerificationCodeTask extends ParentTask
{
    public function __construct(
        protected VerificationCodeRepository $repository
    ) {
    }

    /**
     * @param array $data
     * @return VerificationCode
     * @throws SendVerificationCodeException
     * @throws ValidatorException
     */
    public function run(array $data): VerificationCode
    {
        //        try {

        $now = Carbon::now();
        $code = mt_rand(100000, 999999);
        $expire_in = Carbon::now()->addSeconds(config('appSection-verificationCode.opt-expire-time'));

        $verificationCodeDb = $this->repository->where('receiver_id', $data['receiver_id'])
            ->where('receiver_type', $data['receiver_type'])->latest()->first();

        if (isset($verificationCodeDb)) {
            if (Carbon::now()->lte($verificationCodeDb['expires_in']) && $verificationCodeDb['is_used'] < 1) {
                throw new SendVerificationCodeException();
            }
        }

        $array = [
            'receiver_id' => $data['receiver_id'],
            'receiver_type' => $data['receiver_type'],
            'code' => $code,
            'expires_in' => $expire_in,
            'message' => $data['message'],
            'type' => $data['type'],
            'sent_by' => $data['sent_by'],
        ];

        $verificationCode = $this->repository->create($array);
        CreateVerificationCodeEvent::dispatch($verificationCode);

        return $verificationCode;
        //        } catch (Exception) {
        //            throw new CreateResourceFailedException();
        //        }
    }
}
