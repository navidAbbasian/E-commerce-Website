<?php

namespace App\Containers\AppSection\Carousel\UI\API\Requests;

use App\Containers\AppSection\Carousel\Enums\CarouselTypeEnum;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateCarouselRequest extends ParentRequest
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
        'category_id',
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
            'category_id' => 'exists:categories,id',
            'title' => 'nullable|string',
            'order' => 'numeric|nullable',
            'type' => [new Enum(CarouselTypeEnum::class)],
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
