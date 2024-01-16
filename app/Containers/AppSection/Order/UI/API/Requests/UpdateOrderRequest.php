<?php

namespace App\Containers\AppSection\Order\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateOrderRequest extends ParentRequest
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
        'shop_id',
        'customer_id',
        'discount_id',
        'items.*.product_id',

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
            'shop_id' => 'nullable|exists:shops,id',
            'customer_id' => 'nullable|exists:customers,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'status' => 'nullable|string',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'items.*.product_id' => 'exists:products,id',
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
