<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Containers\AppSection\Customer\Enums\CustomerGenderEnum;
use App\Containers\AppSection\Customer\Enums\CustomerStatusEnum;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateCustomerRequest extends ParentRequest
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
        'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'firstname' => 'nullable|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'mobile' => 'string|nullable|max:11',
            'phone' => 'nullable|string|max:11',
            'email' => 'nullable|string|max:100',
            'national_code' => 'nullable|string|max:10',
            'email_verified_at' => 'nullable|date',
            'password' => 'nullable|max:255', Customer::getPasswordValidationRules(),
            'gender' => 'nullable', [new Enum(CustomerGenderEnum::class)],
            'birth' => 'nullable|date',
            'newsletter' => 'boolean|nullable',
            'score' => 'numeric|nullable',
            'refund_card' => 'string|nullable|max:16',
            'referral_link' => 'string|nullable|max:255',
            'status' => 'nullable', [new Enum(CustomerStatusEnum::class)],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
