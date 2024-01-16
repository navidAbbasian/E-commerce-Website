<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\ResendCodeAction;
use App\Containers\AppSection\User\Actions\VerifyUserAction;
use App\Containers\AppSection\User\UI\API\Requests\ResendCodeRequest;
use App\Containers\AppSection\User\UI\API\Requests\VerifyUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class VerifyUserController extends ApiController
{
    /**
     * @param VerifyUserRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function verifyUser(VerifyUserRequest $request): JsonResponse
    {
        $user = app(VerifyUserAction::class)->run($request);

        return $this->created($this->transform($user, UserTransformer::class));
    }


    /**
     * @param ResendCodeRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function resendCode(ResendCodeRequest $request): JsonResponse
    {
        $user = app(ResendCodeAction::class)->run($request);

        return $this->created($this->transform($user, UserTransformer::class));
    }
}
