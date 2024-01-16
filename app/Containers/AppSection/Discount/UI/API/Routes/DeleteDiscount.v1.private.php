<?php

/**
 * @apiGroup           Discount
 * @apiName            DeleteDiscount
 *
 * @api                {DELETE} /v1/discounts/:id Delete Discount
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

Route::delete('discounts/{id}', [Controller::class, 'deleteDiscount'])
    ->middleware(['auth:api']);

