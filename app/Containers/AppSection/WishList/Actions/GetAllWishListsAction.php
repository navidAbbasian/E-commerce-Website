<?php

namespace App\Containers\AppSection\WishList\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\WishList\Tasks\GetAllWishListsTask;
use App\Containers\AppSection\WishList\UI\API\Requests\GetAllWishListsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllWishListsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllWishListsRequest $request): mixed
    {
        return app(GetAllWishListsTask::class)->run();
    }
}
