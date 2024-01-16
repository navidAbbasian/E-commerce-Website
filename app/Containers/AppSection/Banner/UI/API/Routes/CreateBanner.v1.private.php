<?php

/**
 * @apiGroup           Banner
 *
 * @apiName            CreateBanner
 *
 * @api                {POST} /v1/banners Create Banner
 *
 * @apiDescription     ?search=John
 *                     ?search=name:John
 *                     ?search=name:John%20Doe
 *                     ?orderBy=created_at&sortedBy=desc
 *                     ?orderBy=name&sortedBy=asc
 *
 * @apiVersion         1.0.0
 *
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} title
 * @apiParam           {String} alt
 * @apiParam           {String} link
 * @apiParam           {String} link
 * @apiParam           {Integer} order
 * @apiParam           {String} column [full,half,quarter]
 * @apiParam           {String} page [brand,category,home]
 * @apiParam           {String} situation [before,after]
 * @apiParam           {String} position [up,down,right,left]
 * @apiParam           {Boolean} status [default: 1]
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *      * {
 *     {
 *       "data": {
 *          "object": "Banner",
 *          "id": "pJxe0mwAewonZBMP",
 *          "title": "title",
 *          "alt": "alt",
 *          "link": "www.com",
 *          "order": "1",
 *          "column": "quarter",
 *          "page": "home",
 *          "situation": "after",
 *          "position": "right",
 *          "status": "1",
 *          "real_id": 7,
 *          "created_at": "2023-07-15T10:38:37.000000Z",
 *          "updated_at": "2023-07-15T10:38:37.000000Z",
 *          "readable_created_at": "1 second ago",
 *          "readable_updated_at": "1 second ago"
 * },
 *      "meta": {
 *      "include": [],
 *      "custom": []
 * }
 * }
 * }
 * }
 */

use App\Containers\AppSection\Banner\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('banners', [Controller::class, 'createBanner'])
    ->middleware(['auth:api']);
