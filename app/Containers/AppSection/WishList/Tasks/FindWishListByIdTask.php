<?php

namespace App\Containers\AppSection\WishList\Tasks;

use App\Containers\AppSection\WishList\Data\Repositories\WishListRepository;
use App\Containers\AppSection\WishList\Events\WishListFoundByIdEvent;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindWishListByIdTask extends ParentTask
{
    public function __construct(
        protected WishListRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): WishList
    {
        try {
            $wishlist = $this->repository->find($id);
            WishListFoundByIdEvent::dispatch($wishlist);

            return $wishlist;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
