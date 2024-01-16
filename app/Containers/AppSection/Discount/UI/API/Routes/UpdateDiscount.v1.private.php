<?php

/**
 * @apiGroup           Discount
 * @apiName            UpdateDiscount
 *
 * @api                {PATCH} /v1/discounts/:id Update Discount
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

Route::patch('discounts/{id}', [Controller::class, 'updateDiscount'])
    ->middleware(['auth:api']);

