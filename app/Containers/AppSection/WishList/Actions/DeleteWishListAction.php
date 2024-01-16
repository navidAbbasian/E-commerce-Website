<?php

namespace App\Containers\AppSection\WishList\Actions;

use App\Containers\AppSection\WishList\Tasks\DeleteWishListTask;
use App\Containers\AppSection\WishList\UI\API\Requests\DeleteWishListRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteWishListAction extends ParentAction
{
    /**
     * @param DeleteWishListRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteWishListRequest $request): int
    {
        return app(DeleteWishListTask::class)->run($request->id);
    }
}
