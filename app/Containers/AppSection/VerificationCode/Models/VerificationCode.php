<?php

namespace App\Containers\AppSection\VerificationCode\Models;

use App\Containers\AppSection\VerificationCode\Enums\VerificationCodeTypeEnum;
use App\Containers\AppSection\VerificationCode\Enums\VerificationSentByEnum;
use App\Ship\Parents\Models\Model as ParentModel;

class VerificationCode extends ParentModel
{
    protected $guarded = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'type' => VerificationCodeTypeEnum::class,
        'sent_by' => VerificationSentByEnum::class,
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'VerificationCode';
}
