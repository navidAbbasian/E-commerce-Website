<?php

namespace App\Containers\AppSection\VerificationCode\UI\API\Controllers;

use App\Containers\AppSection\VerificationCode\Actions\CheckCodeAction;
use App\Containers\AppSection\VerificationCode\Actions\CreateVerificationCodeAction;
use App\Containers\AppSection\VerificationCode\UI\API\Requests\CheckCodeRequest;
use App\Containers\AppSection\VerificationCode\UI\API\Requests\CreateVerificationCodeRequest;
use App\Containers\AppSection\VerificationCode\UI\API\Transformers\VerificationCodeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function insertVerificationCodeAction(CreateVerificationCodeRequest $request): JsonResponse
    {
        $verificationcode = app(CreateVerificationCodeAction::class)->run($request);

        return $this->created($this->transform($verificationcode, VerificationCodeTransformer::class));
    }

    public function checkCode(CheckCodeRequest $request): JsonResponse
    {
        $verificationcode = app(CheckCodeAction::class)->run($request);

        return response()->json($verificationcode,200);
    }

    //    /**
    //     * @param CreateVerificationCodeRequest $request
    //     * @return JsonResponse
    //     * @throws InvalidTransformerException
    //     * @throws CreateResourceFailedException
    //     */
    //    public function createVerificationCode(CreateVerificationCodeRequest $request): JsonResponse
    //    {
    //        $verificationcode = app(CreateVerificationCodeAction::class)->run($request);
    //
    //        return $this->created($this->transform($verificationcode, VerificationCodeTransformer::class));
    //    }
    //
    //    /**
    //     * @param FindVerificationCodeByIdRequest $request
    //     * @return array
    //     * @throws InvalidTransformerException
    //     * @throws NotFoundException
    //     */
    //    public function findVerificationCodeById(FindVerificationCodeByIdRequest $request): array
    //    {
    //        $verificationcode = app(FindVerificationCodeByIdAction::class)->run($request);
    //
    //        return $this->transform($verificationcode, VerificationCodeTransformer::class);
    //    }
    //
    //    /**
    //     * @param GetAllVerificationCodesRequest $request
    //     * @return array
    //     * @throws InvalidTransformerException
    //     * @throws CoreInternalErrorException
    //     * @throws RepositoryException
    //     */
    //    public function getAllVerificationCodes(GetAllVerificationCodesRequest $request): array
    //    {
    //        $verificationcodes = app(GetAllVerificationCodesAction::class)->run($request);
    //
    //        return $this->transform($verificationcodes, VerificationCodeTransformer::class);
    //    }
    //
    //    /**
    //     * @param UpdateVerificationCodeRequest $request
    //     * @return array
    //     * @throws InvalidTransformerException
    //     * @throws UpdateResourceFailedException
    //     */
    //    public function updateVerificationCode(UpdateVerificationCodeRequest $request): array
    //    {
    //        $verificationcode = app(UpdateVerificationCodeAction::class)->run($request);
    //
    //        return $this->transform($verificationcode, VerificationCodeTransformer::class);
    //    }
    //
    //    /**
    //     * @param DeleteVerificationCodeRequest $request
    //     * @return JsonResponse
    //     * @throws DeleteResourceFailedException
    //     */
    //    public function deleteVerificationCode(DeleteVerificationCodeRequest $request): JsonResponse
    //    {
    //        app(DeleteVerificationCodeAction::class)->run($request);
    //
    //        return $this->noContent();
    //    }
}
