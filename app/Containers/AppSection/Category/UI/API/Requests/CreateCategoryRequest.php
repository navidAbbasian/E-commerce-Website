<?php

namespace App\Containers\AppSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateCategoryRequest extends ParentRequest
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
         'shop_id',
         'parent_id',
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
            'shop_id' => 'required|exists:shops,id',
            'parent_id' => 'nullable|exists:categories,id',
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'description' => 'required|string',
            'meta_description' => 'required|string',
            'order' => 'required|numeric',
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
