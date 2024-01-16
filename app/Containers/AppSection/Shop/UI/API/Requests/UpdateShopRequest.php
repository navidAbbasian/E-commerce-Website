<?php

namespace App\Containers\AppSection\Shop\UI\API\Requests;

use App\Containers\AppSection\Shop\Enums\ShopStatusEnum;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateShopRequest extends ParentRequest
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
        'user_id',
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
            'user_id' => 'exists:users,id',
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'description' => 'required|string',
            'meta_description' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'area_code' => 'required|string',
            'phone' => 'required|string',
            'score_worth' => 'required|numeric',
            'status' => [new Enum(ShopStatusEnum::class)],

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
