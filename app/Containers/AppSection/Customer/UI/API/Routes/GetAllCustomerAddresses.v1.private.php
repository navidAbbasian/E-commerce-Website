<?php

/**
 * @apiGroup           CustomerAddress
 * @apiName            GetAllCustomerAddresses
 *
 * @api                {GET} /v1/customer-addresses Get All Customer Addresses
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

Route::get('customer-addresses', [CustomerAddressController::class, 'getAllCustomerAddresses'])
    ->middleware(['auth:api']);

