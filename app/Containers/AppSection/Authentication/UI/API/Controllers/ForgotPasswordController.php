<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\ForgotPasswordAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\ForgotPasswordRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends ApiController
{
    public function __construct(
        private readonly ForgotPasswordAction $forgotPasswordAction
    ) {
    }

    public function __invoke(ForgotPasswordRequest $request): JsonResponse
    {
        $this->forgotPasswordAction->run($request);

        return $this->noContent();
    }
}
