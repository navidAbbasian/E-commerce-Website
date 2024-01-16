<?php

/**
 * @apiGroup           CustomerAddress
 * @apiName            CreateCustomerAddress
 *
 * @api                {POST} /v1/customer-addresses Create Customer Address
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

use App\Containers\AppSection\Customer\UI\API\Controllers\CustomerAddressController;
use Illuminate\Support\Facades\Route;

Route::post('customer-addresses', [CustomerAddressController::class, 'createCustomerAddress'])
    ->middleware(['auth:api']);

