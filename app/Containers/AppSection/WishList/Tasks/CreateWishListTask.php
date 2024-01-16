<?php

namespace App\Containers\AppSection\WishList\Tasks;

use App\Containers\AppSection\WishList\Data\Repositories\WishListRepository;
use App\Containers\AppSection\WishList\Events\WishListCreatedEvent;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateWishListTask extends ParentTask
{
    public function __construct(
        protected WishListRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): WishList
    {
        try {
            $wishlist = $this->repository->create($data);
            WishListCreatedEvent::dispatch($wishlist);

            return $wishlist;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
