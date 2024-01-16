<?php

namespace App\Containers\AppSection\WishList\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\WishList\Tasks\GetAllWishListItemsTask;
use App\Containers\AppSection\WishList\UI\API\Requests\GetAllWishListItemsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllWishListItemsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllWishListItemsRequest $request): mixed
    {
        return app(GetAllWishListItemsTask::class)->run();
    }
}
