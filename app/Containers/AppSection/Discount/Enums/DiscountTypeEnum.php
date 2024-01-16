<?php

namespace App\Containers\AppSection\Discount\Enums;

enum DiscountTypeEnum: string
{
    case Gift = 'gift';

    case Private = 'private';

    case Public = 'public';
}
