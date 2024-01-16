<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateCustomerAddressRequest extends ParentRequest
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
        'customer_id',
        'city_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        // 'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'city_id' => 'required|exists:cities,id',
            'fullname' => 'required|string|max:255',
            'address' => 'required|string',
            'zipcode' => 'required|numeric|max_digits:10|min_digits:10',
            'floor' => 'required|numeric|max_digits:3',
            'unit' => 'required|numeric|max_digits:4',
            'number' => 'required|numeric|max_digits:5',
            'mobile' => 'required|numeric|max_digits:11|min_digits:11',
            'phone' => 'required|numeric|max_digits:11|min_digits:11',
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
