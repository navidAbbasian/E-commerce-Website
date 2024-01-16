<?php

namespace App\Containers\AppSection\WishList\Actions;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tasks\FindWishListByIdTask;
use App\Containers\AppSection\WishList\UI\API\Requests\FindWishListByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindWishListByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindWishListByIdRequest $request): WishList
    {
        return app(FindWishListByIdTask::class)->run($request->id);
    }
}
