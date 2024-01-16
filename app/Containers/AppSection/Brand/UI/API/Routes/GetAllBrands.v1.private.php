<?php

/**
 * @apiGroup           Brand
 * @apiName            GetAllBrands
 *
 * @api                {GET} /v1/brands Get All Brands
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

use App\Containers\AppSection\Brand\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('brands', [Controller::class, 'getAllBrands'])
    ->middleware(['auth:api']);

