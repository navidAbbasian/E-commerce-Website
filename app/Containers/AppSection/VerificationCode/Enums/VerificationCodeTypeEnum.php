<?php

namespace App\Containers\AppSection\VerificationCode\Enums;

enum VerificationCodeTypeEnum: string
{
    case Register = 'register';
    case Login = 'Login';
    case Newsletter = 'newsletter';

}
