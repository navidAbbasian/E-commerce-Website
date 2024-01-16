<?php

namespace App\Containers\AppSection\WishList\Actions;

use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tasks\FindWishListItemByIdTask;
use App\Containers\AppSection\WishList\UI\API\Requests\FindWishListItemByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindWishListItemByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindWishListItemByIdRequest $request): WishListItem
    {
        return app(FindWishListItemByIdTask::class)->run($request->id);
    }
}
