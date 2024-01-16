<?php

/**
 * @apiGroup           Discount
 * @apiName            CreateDiscount
 *
 * @api                {POST} /v1/discounts Create Discount
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

use App\Containers\AppSection\Discount\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('discounts', [Controller::class, 'createDiscount'])
    ->middleware(['auth:api']);

