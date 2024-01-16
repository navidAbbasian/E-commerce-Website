<?php

namespace App\Containers\AppSection\Banner\UI\API\Requests;

use App\Containers\AppSection\Banner\Enums\BannerColumnEnum;
use App\Containers\AppSection\Banner\Enums\BannerPageEnum;
use App\Containers\AppSection\Banner\Enums\BannerPositionEnum;
use App\Containers\AppSection\Banner\Enums\BannerSituationEnum;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rules\Enum;

class CreateBannerRequest extends ParentRequest
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
            'title' => 'nullable|string',
            'alt' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'nullable|numeric',
            'column' => [new Enum(BannerColumnEnum::class)],
            'page' => [new Enum(BannerPageEnum::class)],
            'situation' => [new Enum(BannerSituationEnum::class)],
            'position' => [new Enum(BannerPositionEnum::class)],
            'status' => 'nullable|numeric',
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
