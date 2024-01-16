<?php

/**
 * @apiGroup           UserAddress
 * @apiName            DeleteUserAddress
 *
 * @api                {DELETE} /v1/user-addresses/:id Delete User Address
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

Route::delete('user-addresses/{id}', [UserAddressController::class, 'deleteUserAddress'])
    ->middleware(['auth:api']);

