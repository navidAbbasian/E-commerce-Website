<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\SendVerificationEmailAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\SendVerificationEmailRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class SendVerificationEmailController extends ApiController
{
    public function __construct(
        private readonly SendVerificationEmailAction $sendVerificationEmailAction
    ) {
    }

    public function __invoke(SendVerificationEmailRequest $request): JsonResponse
    {
        $this->sendVerificationEmailAction->run($request);

        return $this->accepted();
    }
}
