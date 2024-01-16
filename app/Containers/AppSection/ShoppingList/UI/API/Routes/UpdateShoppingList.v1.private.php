<?php

/**
 * @apiGroup           ShoppingList
 * @apiName            UpdateShoppingList
 *
 * @api                {PATCH} /v1/shopping-lists/:id Update Shopping List
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

use App\Containers\AppSection\ShoppingList\UI\API\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

Route::patch('shopping-lists/{id}', [ShoppingListController::class, 'updateShoppingList'])
    ->middleware(['auth:api']);

