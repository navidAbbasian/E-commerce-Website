<?php

namespace App\Containers\AppSection\Media\Enums;

enum MediaDiskEnum: string
{
    case S3 = 's3';

    case Local = 'local';

}
