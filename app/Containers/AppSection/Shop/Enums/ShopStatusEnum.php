<?php

namespace App\Containers\AppSection\Shop\Enums;

enum ShopStatusEnum: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Inactive = 'inactive';
    case Ban = 'ban';
}
