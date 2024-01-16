<?php

/**
 * @apiGroup           Tax
 * @apiName            CreateTax
 *
 * @api                {POST} /v1/taxes Create Tax
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

use App\Containers\AppSection\Tax\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('taxes', [Controller::class, 'createTax'])
    ->middleware(['auth:api']);

