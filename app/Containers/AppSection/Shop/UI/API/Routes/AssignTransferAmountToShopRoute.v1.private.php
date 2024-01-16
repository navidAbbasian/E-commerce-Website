<?php

/**
 * @apiGroup           Domain
 * @apiName            CreateDomain
 *
 * @api                {POST} /v1/domains Create Domain
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

use App\Containers\AppSection\Shop\UI\API\Controllers\ShopTransferAmountController;
use Illuminate\Support\Facades\Route;

Route::post('shop-transfer-amount', [ShopTransferAmountController::class, 'assignTransferAmountToShop'])
    ->middleware(['auth:api']);

