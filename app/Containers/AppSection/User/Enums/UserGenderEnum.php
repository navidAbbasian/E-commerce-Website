<?php

namespace App\Containers\AppSection\User\Enums;

enum UserGenderEnum: string
{
    case Male = 'male';
    case Female = 'female';
    case NotSpecified = 'not specified';
}
