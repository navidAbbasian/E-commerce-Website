<?php

/**
 * @apiGroup           WishListItem
 * @apiName            GetAllWishListItems
 *
 * @api                {GET} /v1/wish-list-items Get All Wish List Items
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

Route::get('wish-list-items', [WishListItemController::class, 'getAllWishListItems'])
    ->middleware(['auth:api']);

