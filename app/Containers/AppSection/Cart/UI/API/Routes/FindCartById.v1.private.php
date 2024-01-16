<?php

/**
 * @apiGroup           Cart
 * @apiName            FindCartById
 *
 * @api                {GET} /v1/carts/:id Find Cart By Id
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

use App\Containers\AppSection\Cart\UI\API\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('carts/{id}', [CartController::class, 'findCartById'])
    ->middleware(['auth:api']);

