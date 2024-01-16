<?php

namespace App\Containers\AppSection\Product\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateProductRequest extends ParentRequest
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
        'brand_id',
        'categories.*.id',
        'tags.*.id',
        'taxes.*.id',
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
            'brand_id' => 'nullable|exists:brands,id',
            'title' => 'required|string|max:100',
            'meta_title' => 'string',
            'description' => 'string',
            'meta_description' => 'string',
            'price' => 'required|numeric',
            'weight' => 'numeric',
            'length' => 'numeric',
            'width' => 'numeric',
            'height' => 'numeric',
            'quantity' => 'numeric',
            'score' => 'numeric',
            'status' => 'numeric',
            'categories' => 'nullable|array',
            'categories.*.id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*.id' => 'nullable|exists:tags,id',
            'taxes' => 'nullable|array',
            'taxes.*.id' => 'nullable|exists:taxes,id',
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
