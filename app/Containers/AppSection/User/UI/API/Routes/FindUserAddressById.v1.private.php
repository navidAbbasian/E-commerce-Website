<?php

/**
 * @apiGroup           UserAddress
 * @apiName            FindUserAddressById
 *
 * @api                {GET} /v1/user-addresses/:id Find User Address By Id
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

use App\Containers\AppSection\UserAddress\UI\API\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;

Route::get('user-addresses/{id}', [UserAddressController::class, 'findUserAddressById'])
    ->middleware(['auth:api']);

