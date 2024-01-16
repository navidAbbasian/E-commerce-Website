<?php

/**
 * @apiGroup           WishListItem
 * @apiName            FindWishListItemById
 *
 * @api                {GET} /v1/wish-list-items/:id Find Wish List Item By Id
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

use App\Containers\AppSection\WishList\UI\API\Controllers\WishListItemController;
use Illuminate\Support\Facades\Route;

Route::get('wish-list-items/{id}', [WishListItemController::class, 'findWishListItemById'])
    ->middleware(['auth:api']);

