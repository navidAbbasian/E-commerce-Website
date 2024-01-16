<?php

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\Authentication\Notifications\VerifyEmail;
use App\Containers\AppSection\Authentication\Traits\AuthenticationTrait;
use App\Containers\AppSection\Authorization\Traits\AuthorizationTrait;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\User\Enums\UserGenderEnum;
use App\Containers\AppSection\User\Enums\UserStatusEnum;
use App\Ship\Contracts\MustVerifyEmail;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\Rules\Password;

class User extends ParentUserModel implements MustVerifyEmail
{
    use AuthorizationTrait;
    use AuthenticationTrait;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth' => 'date',
        'gender' => UserGenderEnum::class,
        'status' => UserStatusEnum::class,
    ];

    public static function getPasswordValidationRules(): Password
    {
        return Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();
    }

    public function sendEmailVerificationNotificationWithVerificationUrl(string $verificationUrl): void
    {
        $this->notify(new VerifyEmail($verificationUrl));
    }

    protected function email(): Attribute
    {
        return new Attribute(
            get: fn (?string $value): ?string => is_null($value) ? null : strtolower($value),
        );
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class, 'user_id', 'id');
    }
}
