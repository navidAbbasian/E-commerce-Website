<?php

namespace App\Containers\AppSection\Brand\UI\API\Requests;

use App\Containers\AppSection\Brand\Traits\IsResourceOwnerTrait;
use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateBrandRequest extends ParentRequest
{
    use IsResourceOwnerTrait;
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
            'title' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
            'isResourceOwner',
        ]);
    }
}
