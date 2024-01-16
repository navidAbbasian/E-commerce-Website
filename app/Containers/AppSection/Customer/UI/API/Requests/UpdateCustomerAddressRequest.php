<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateCustomerAddressRequest extends ParentRequest
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
        'city_id',
        'customer_id',
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
            'customer_id' => 'nullable|exists:customers,id',
            'city_id' => 'nullable|exists:cities,id',
            'fullname' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'zipcode' => 'nullable|numeric|max_digits:10|min_digits:10',
            'floor' => 'nullable|numeric|max_digits:3',
            'unit' => 'nullable|numeric|max_digits:4',
            'number' => 'nullable|numeric|max_digits:5',
            'mobile' => 'nullable|numeric|max_digits:11|min_digits:11',
            'phone' => 'nullable|numeric|max_digits:11|min_digits:11',
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
