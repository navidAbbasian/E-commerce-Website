<?php

/**
 * @apiGroup           User
 * @apiName            VerifyUserController
 *
 * @api                {POST} /v1/resend-code Verify User CustomerController
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\User\UI\API\Controllers\VerifyUserController;
use Illuminate\Support\Facades\Route;

Route::post('resend-code', [VerifyUserController::class, 'resendCode']);

