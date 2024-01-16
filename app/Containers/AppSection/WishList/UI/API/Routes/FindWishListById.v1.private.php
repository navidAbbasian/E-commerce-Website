<?php

/**
 * @apiGroup           WishListController
 * @apiName            FindWishListById
 *
 * @api                {GET} /v1/wish-lists/:id Find Wish List By Id
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

use App\Containers\AppSection\WishList\UI\API\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

Route::get('wish-lists/{id}', [WishListController::class, 'findWishListById'])
    ->middleware(['auth:api']);

