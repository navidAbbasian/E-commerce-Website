<?php

/**
 * @apiGroup           Domain
 * @apiName            UpdateDomain
 *
 * @api                {PATCH} /v1/domains/:id Update Domain
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

use App\Containers\AppSection\Shop\UI\API\Controllers\DomainController;
use Illuminate\Support\Facades\Route;

Route::patch('domains/{id}', [DomainController::class, 'updateDomain'])
    ->middleware(['auth:api']);

