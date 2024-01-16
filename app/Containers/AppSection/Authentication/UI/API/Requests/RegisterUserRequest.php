<?php

namespace App\Containers\AppSection\Authentication\UI\API\Requests;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
    ];

    public function rules(): array
    {
        return [
//            'email' => 'required|email|unique:users,email',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'mobile' => 'required|numeric|max_digits:11|unique:users,mobile',
            'password' => [
                'required',
                User::getPasswordValidationRules(),
            ],
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
