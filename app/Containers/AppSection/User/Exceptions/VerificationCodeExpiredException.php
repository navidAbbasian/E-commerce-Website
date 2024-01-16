<?php

namespace App\Containers\AppSection\User\Exceptions;

use App\Ship\Parents\Exceptions\Exception as ParentException;
use Symfony\Component\HttpFoundation\Response;

class VerificationCodeExpiredException extends ParentException
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'کد ارسال شده نادرست است.';
}
