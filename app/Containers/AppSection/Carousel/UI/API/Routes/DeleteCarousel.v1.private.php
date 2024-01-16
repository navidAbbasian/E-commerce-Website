<?php

/**
 * @apiGroup           Carousel
 * @apiName            DeleteCarousel
 *
 * @api                {DELETE} /v1/carousels/:id Delete Carousel
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

Route::delete('carousels/{id}', [Controller::class, 'deleteCarousel'])
    ->middleware(['auth:api']);

