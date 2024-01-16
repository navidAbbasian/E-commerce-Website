<?php

namespace App\Containers\AppSection\WishList\Actions;

use App\Containers\AppSection\WishList\Tasks\DeleteWishListItemTask;
use App\Containers\AppSection\WishList\UI\API\Requests\DeleteWishListItemRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteWishListItemAction extends ParentAction
{
    /**
     * @param DeleteWishListItemRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteWishListItemRequest $request): int
    {
        return app(DeleteWishListItemTask::class)->run($request->id);
    }
}
