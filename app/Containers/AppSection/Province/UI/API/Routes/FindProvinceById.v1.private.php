<?php

/**
 * @apiGroup           Province
 * @apiName            FindProvinceById
 *
 * @api                {GET} /v1/provinces/:id Find Province By Id
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

use App\Containers\AppSection\Province\UI\API\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

Route::get('provinces/{id}', [ProvinceController::class, 'findProvinceById'])
    ->middleware(['auth:api']);

