<?php

/**
 * @apiGroup           Carousel
 * @apiName            GetAllCarousels
 *
 * @api                {GET} /v1/carousels Get All Carousels
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

use App\Containers\AppSection\Carousel\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('carousels', [Controller::class, 'getAllCarousels'])
    ->middleware(['auth:api']);

