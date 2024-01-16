<?php

/**
 * @apiGroup           Shop
 * @apiName            DeleteShop
 *
 * @api                {DELETE} /v1/shops/:id Delete Shop
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

Route::delete('shops/{id}', [ShopController::class, 'deleteShop'])
    ->middleware(['auth:api']);

