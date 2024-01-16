<?php

/**
 * @apiGroup           Header
 * @apiName            FindHeaderById
 *
 * @api                {GET} /v1/headers/:id Find Header By Id
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

use App\Containers\AppSection\Header\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('headers/{id}', [Controller::class, 'findHeaderById'])
    ->middleware(['auth:api']);

