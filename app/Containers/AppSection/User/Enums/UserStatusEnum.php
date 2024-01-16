<?php


namespace App\Containers\AppSection\User\Enums;

enum UserStatusEnum: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Ban = 'ban';
}
