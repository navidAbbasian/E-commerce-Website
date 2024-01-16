<?php

/**
 * @apiGroup           Shop
 * @apiName            GetAllShops
 *
 * @api                {GET} /v1/shops Get All Shops
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

use App\Containers\AppSection\Shop\UI\API\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('shops', [ShopController::class, 'getAllShops'])
    ->middleware(['auth:api']);

