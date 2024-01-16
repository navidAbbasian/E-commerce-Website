<?php

namespace App\Containers\AppSection\VerificationCode\Exceptions;

use App\Ship\Parents\Exceptions\Exception as ParentException;
use Symfony\Component\HttpFoundation\Response;

class SendVerificationCodeException extends ParentException
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'کد ارسال شده است';
}
