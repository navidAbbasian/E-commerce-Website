<?php

namespace App\Containers\AppSection\WishList\Tasks;

use App\Containers\AppSection\WishList\Data\Repositories\WishListItemRepository;
use App\Containers\AppSection\WishList\Events\WishListItemCreatedEvent;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateWishListItemTask extends ParentTask
{
    public function __construct(
        protected WishListItemRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): WishListItem
    {
        try {
            $wishlistitem = $this->repository->create($data);
            WishListItemCreatedEvent::dispatch($wishlistitem);

            return $wishlistitem;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
