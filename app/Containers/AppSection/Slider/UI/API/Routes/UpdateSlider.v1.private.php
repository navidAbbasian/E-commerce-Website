<?php

/**
 * @apiGroup           Slider
 * @apiName            UpdateSlider
 *
 * @api                {PATCH} /v1/sliders/:id Update Slider
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

use App\Containers\AppSection\Slider\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('sliders/{id}', [Controller::class, 'updateSlider'])
    ->middleware(['auth:api']);

