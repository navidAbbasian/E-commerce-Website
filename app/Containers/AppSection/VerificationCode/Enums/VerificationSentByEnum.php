<?php

namespace App\Containers\AppSection\VerificationCode\Enums;

enum VerificationSentByEnum: string
{
    case Email = 'email';
    case SMS = 'sms';
}
