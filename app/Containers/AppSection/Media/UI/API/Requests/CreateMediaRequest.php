<?php

namespace App\Containers\AppSection\Media\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateMediaRequest extends ParentRequest
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
         'original_media_id',
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
             'original_media_id' => 'required|exists:media,id',
             '' => 'required|exists:media,id',
             'original_media_id' => 'required|exists:media,id',
             'original_media_id' => 'required|exists:media,id',
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
