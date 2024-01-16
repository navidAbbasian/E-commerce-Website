<?php

/**
 * @apiGroup           Shop
 * @apiName            CreateShop
 *
 * @api                {POST} /v1/shops Create Shop
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

Route::post('shops', [ShopController::class, 'createShop'])
    ->middleware(['auth:api']);

