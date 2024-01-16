<?php

/**
 * @apiGroup           CartItem
 * @apiName            UpdateCartItem
 *
 * @api                {PATCH} /v1/cart-items/:id Update Cart Item
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

use App\Containers\AppSection\Cart\UI\API\Controllers\CartItemController;
use Illuminate\Support\Facades\Route;

Route::patch('cart-items/{id}', [CartItemController::class, 'updateCartItem'])
    ->middleware(['auth:api']);

