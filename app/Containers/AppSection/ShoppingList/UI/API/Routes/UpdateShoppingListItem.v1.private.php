<?php

/**
 * @apiGroup           ShoppingListItem
 * @apiName            UpdateShoppingListItem
 *
 * @api                {PATCH} /v1/shopping-list-items/:id Update Shopping List Item
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

use App\Containers\AppSection\ShoppingList\UI\API\Controllers\ShoppingListItemController;
use Illuminate\Support\Facades\Route;

Route::patch('shopping-list-items/{id}', [ShoppingListItemController::class, 'updateShoppingListItem'])
    ->middleware(['auth:api']);

