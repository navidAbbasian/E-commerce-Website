<?php

namespace App\Containers\AppSection\Discount\UI\API\Requests;

use App\Containers\AppSection\Discount\Enums\DiscountTypeEnum;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rules\Enum;

class CreateDiscountRequest extends ParentRequest
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
        'customer_id',
        'shop_id',
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
            'shop_id' => 'exists:shops,id',
            'customer_id' => 'nullable|exists:customers,id',
            'title' => 'required|string',
            'value' => 'required|numeric',
            'started_at' => 'date|nullable',
            'ended_at' => 'date|nullable',
            'min_buy' => 'required|numeric',
            'max_discount' => 'required|numeric',
            'type' => [new Enum(DiscountTypeEnum::class)],
            'is_percent' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'remain' => 'nullable|numeric',
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
