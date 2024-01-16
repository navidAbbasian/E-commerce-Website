<?php


namespace App\Containers\AppSection\Customer\Enums;

enum CustomerStatusEnum: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Ban = 'ban';
}
