<?php

namespace App\Containers\AppSection\WishList\Tasks;

use App\Containers\AppSection\WishList\Data\Repositories\WishListItemRepository;
use App\Containers\AppSection\WishList\Events\WishListItemFoundByIdEvent;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindWishListItemByIdTask extends ParentTask
{
    public function __construct(
        protected WishListItemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): WishListItem
    {
        try {
            $wishlistitem = $this->repository->find($id);
            WishListItemFoundByIdEvent::dispatch($wishlistitem);

            return $wishlistitem;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
