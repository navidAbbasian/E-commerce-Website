<?php

namespace App\Containers\AppSection\Comment\Enums;

enum CommentStatusEnum: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
}
