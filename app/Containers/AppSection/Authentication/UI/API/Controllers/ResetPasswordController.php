<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\ResetPasswordAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\ResetPasswordRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class ResetPasswordController extends ApiController
{
    public function __construct(
        private readonly ResetPasswordAction $resetPasswordAction
    ) {
    }

    public function __invoke(ResetPasswordRequest $request): JsonResponse
    {
        $this->resetPasswordAction->run($request);

        return $this->noContent();
    }
}
