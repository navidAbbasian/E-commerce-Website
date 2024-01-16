<?php

namespace App\Containers\AppSection\VerificationCode\UI\API\Transformers;

use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class VerificationCodeTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(VerificationCode $verificationcode): array
    {
        $response = [
            'object' => $verificationcode->getResourceKey(),
            'id' => $verificationcode->getHashedKey(),
            'receiver_id' => $verificationcode->encode($verificationcode->receiver_id),
            'receiver_type' => $verificationcode->receiver_type,
            'code' => $verificationcode->code,
            'expires_in' => $verificationcode->expires_in,
            'message' => $verificationcode->message,
            'type' => $verificationcode->type,
            'sent_by' => $verificationcode->sent_by,
            'is_used' => $verificationcode->is_used,
        ];

        return $this->ifAdmin([
            'real_id' => $verificationcode->id,
            'created_at' => $verificationcode->created_at,
            'updated_at' => $verificationcode->updated_at,
            'readable_created_at' => $verificationcode->created_at->diffForHumans(),
            'readable_updated_at' => $verificationcode->updated_at->diffForHumans(),
            // 'deleted_at' => $verificationcode->deleted_at,
        ], $response);
    }
}
