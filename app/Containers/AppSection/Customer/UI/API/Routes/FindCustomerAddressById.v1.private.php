<?php

/**
 * @apiGroup           CustomerAddress
 * @apiName            FindCustomerAddressById
 *
 * @api                {GET} /v1/customer-addresses/:id Find Customer Address By Id
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

Route::get('customer-addresses/{id}', [CustomerAddressController::class, 'findCustomerAddressById'])
    ->middleware(['auth:api']);

