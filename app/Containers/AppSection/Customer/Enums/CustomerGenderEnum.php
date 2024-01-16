<?php

namespace App\Containers\AppSection\Customer\Enums;

enum CustomerGenderEnum: string
{
    case Male = 'male';
    case Female = 'female';
    case NotSpecified = 'not specified';
}
